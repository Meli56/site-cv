/*Schéma relationnel:
Personne(email (1) NN UQ, prenom NN, nom NN, dateNaissance NN, sexe NN, taille NN, poids NN, passsword NN)
Activite(idActivite (1), desscription NN, date NN, heureDebut NN, heureFin NN, duree NN, distanceParcourue, cardiaqueMin NN, cardiaqueMax NN, cardiaqueMoy NN, personne=email@Personne)
Donnee(idDonnee (1) latitude NN, longitude NN, altitude NN, uneACtivite=idActivite@Activite)

Contraintes textuelles:
- chaque attribut doit être renseigné
- Vérifier que la personne est bien né avant la daate de l'activité
- Vérifier que l'heure de debut est bien inférieur à l'heure de fin
- Le mot de passe est d'au monis 8 caractères
- L'email est bien valide
- Le sexe est bien "HOMME", "FEMME" ou "AUTRE"
- La frequence cardiaque maximum = 220 - age
*/

DROP TABLE Donnee;
DROP TABLE Activite;
DROP TABLE Personne;

CREATE TABLE Personne
    (
        email TEXT
            CONSTRAINT pk_Personne PRIMARY KEY
            CONSTRAINT nn_email NOT NULL
            CONSTRAINT uq_email UNIQUE
            CONSTRAINT ck_email CHECK (email LIKE '%_@%_.%_'),
            
        prenom TEXT
            CONSTRAINT nn_prenom NOT NULL,
        nom TEXT
            CONSTRAINT nn_nom NOT NULL,
        dateNaissance DATE
            CONSTRAINT nn_dateNaissance NOT NULL,
        sexe TEXT
            CONSTRAINT nn_dateNaissance NOT NULL
            CONSTRAINT ck_sexe CHECK(sexe = 'HOMME' OR sexe = 'FEMME' OR sexe = 'AUTRE'),
        taille REAL
            CONSTRAINT nn_taille NOT NULL
            CONSTRAINT ck_taille CHECK(taille > 0),
        poids REAL
            CONSTRAINT nn_poids NOT NULL
            CONSTRAINT ck_poids CHECK(poids > 0),
        passsword TEXT  
            CONSTRAINT nn_passsword NOT NULL
            CONSTRAINT ck_passsword CHECK(LENGTH(passsword) > 8)
        )
;

CREATE TABLE Activite
    (
        idActivite REAL
            CONSTRAINT pk_Activite PRIMARY KEY,
            
        desscription TEXT
            CONSTRAINT nn_desscription NOT NULL,
          
        daate DATE
            CONSTRAINT nn_daate NOT NULL,
           
        heureDebut TIME
            CONSTRAINT nn_heureDebut NOT NULL,
            
        heureFin TIME
            CONSTRAINT nn_heureFin NOT NULL,
            
        duree TIME
            CONSTRAINT nn_duree NOT NULL,
            
        distanceParcourue REAL,
        
        cardiaqueMin REAL
            CONSTRAINT nn_cardiaqueMin NOT NULL,
            
        cardiaqueMax REAL
            CONSTRAINT nn_cardiaqueMax NOT NULL,
            
        cardiaqueMoy REAL
            CONSTRAINT nn_cardiaqueMoy NOT NULL,
            
        personne TEXT
            CONSTRAINT fk_Activite_Personne REFERENCES Personne(email)
            CONSTRAINT nn_personne NOT NULL
    )
;

CREATE TABLE Donnee
    (
        idDonnee REAL
            CONSTRAINT pk_Donnee PRIMARY KEY,

        latitude REAL
            CONSTRAINT nn_latitude NOT NULL,

        longitude REAL
            CONSTRAINT nn_longitude NOT NULL,

        altitude REAL
            CONSTRAINT nn_altitude NOT NULL,

        uneActivite REAL
            CONSTRAINT fk_Donne_Activite REFERENCES Activite(idActivite)
            CONSTRAINT nn_uneactivite NOT NULL
    )
;

------------------------
--  Triggers et vues  --
------------------------
---------------------------------------------
-- agePersonne = CURRENT - dateNaissance   --
---------------------------------------------

CREATE VIEW vue_agePersonne
AS
    SELECT strftime('%Y','now') - (SELECT dateNaissance, strftime('%Y',dateNaissance) FROM Personne)
;
/
----------------------------
-- heureDebut < heureFin  --
----------------------------
CREATE TRIGGER IF NOT EXISTS trig_debutFin 
BEFORE INSERT ON Activite
FOR EACH ROW
BEGIN 
    CREATE TEMP good (heureDebut, heurefin);
    
    INSERT ON good VALUES(heureDebut, heureFin);

    IF (heureDebut > heureFin) THEN
        RAISE_APPLICATION_ERROR(-20001,'L heure de fin est inferieure a celle du debut');
        END IF;
END;
/

-------------------------------------------------------------------------------
-- La fréquence cardiaque maximale enregistrée doit etre inférieur à 220-age --
-------------------------------------------------------------------------------

CREATE TRIGGER IF NOT EXISTS trig_cardiaque
AFTER INSERT ON Activite
FOR EACH ROW 
BEGIN
    CREATE TEMP TABLE CardiaqueTable IF NOT EXISTS(idActivite REAL PRIMARY KEY, cardiaqueMax REAL, age REAL);
    INSERT INTO CardiaqueTable VALUES (idActivite, cardiaqueMax, SELECT age FROM vue_agePersonne WHERE uneActivite = idActivite)
    IF .CardiaqueTable.cardiaqueMax > (220 - CardiaqueTable.age) THEN
        RAISE_APPLICATION_ERROR(-20001,'cardiaque max invalide / faux renseignement');
    END IF;


END;
/



