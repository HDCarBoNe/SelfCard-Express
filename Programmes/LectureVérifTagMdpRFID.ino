/*/////LIBRARIES\\\\\*/
#include <Wire.h>
#include <Adafruit_NFCShield_I2C.h>  //Librairie du shield RFID
/*/////PORTS\\\\\*/
#define IRQ   (2)  //Declaration du PIN IRQ du shied
#define RESET (3)  //Declaration du PIN de reset pas connecté d'origine
Adafruit_NFCShield_I2C nfc(IRQ, RESET); //Definition de la connection du shield sur l'Arduino
/*/////VARIABLES&TABLEAUX\\\\\*/
char codeDef[6] = {'1', '2', '3', '4',-1};
char codeRent[6];

void setup(void) {
  Serial.begin(115200);  //Definiton du moniteur serie
  Serial.println("Hello!");

  nfc.begin();  //Definition du shied

  uint32_t versiondata = nfc.getFirmwareVersion();
  if (! versiondata) { //Vérification de la version du shield et de sa compaibilite
    Serial.print("Didn't find PN53x board");
    while (1); //Interrompt le programme si le shield n'est pas detecte
  }
  
  //Affichage des informations
  Serial.print("Found chip PN5"); Serial.println((versiondata>>24) & 0xFF, HEX); //Affichage de la version du shield
  Serial.print("Firmware ver. "); Serial.print((versiondata>>16) & 0xFF, DEC);  //Affichage de la version de la librairie
  Serial.print('.'); Serial.println((versiondata>>8) & 0xFF, DEC);  //
  
  nfc.setPassiveActivationRetries(0xFF); /*Definition du nombre de tentative de lecture de la carte RFID, 
                                                  pour ne pas lire plusieurs fois la meme carte*/
  
  nfc.SAMConfig(); //Configuration du shield pour la lecture de tag RFID
   
  Serial.println("Waiting for an ISO14443A card"); //Le programme attend en boucle qu'une carte soit détectée
}

void loop(void) {
  boolean success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  //Tableau qui stocke le tag RFID
  uint8_t uidLength;                        //Longueur du tag (4 ou 7 bits)
  
  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength); //Vérifie si la carte detectee correspond au caracteristiques dd'un carte MiFare (4 ou 7 bits).
  while(Serial.read() != -1);//Vide le buffer de l'Arduino pour eviter que des caracteres ne reste en memoire
  if (success) {
    Serial.println("Found a card!");
    Serial.print("UID Length: ");Serial.print(uidLength, DEC);Serial.println(" bytes");//Affichage de la longueur du tag
    Serial.print("UID Value: "); //Affichage de la valeur du tag
    for (uint8_t i=0; i < uidLength; i++) 
    {
      Serial.print(" 0x");Serial.print(uid[i]); 
    }
    Serial.println("");
  
    delay(1000); //Attente d'une seconde avant une prochaine lecture
  }
  else
  {
    Serial.println("Timed out waiting for a card"); //Affichage d'erreur si la carte detectee ne renvoie pas de tag
  }
  //Comparaison du tag defini et du tag lu
  if ((uid[0] == 195) && (uid[1] == 21) && (uid[2]== 35) && (uid[3] == 208)){ //Tag accepte
    Serial.println("Card accepted");
    Serial.println("Password :");//Demande de mot de passe
    delay(5000); //Attente pour entrer le mot de passe
    for(int i=0;i<5;i++){ //Decoupage en caractere du mot de passe rentre
      codeRent[i]= Serial.read();
    }
  //Comparaison du mot de passe enregistre et de celui envoye via le moniteur serie 
    if (strcmp(codeRent, codeDef) == 0){  //Si les tags sont identiques
      Serial.println("Password accepted");
      }
    else Serial.println("Password refused");
    }
    else {
      Serial.println("Card refused");
    }
    delay(4000)
}
