/******************************************************
-- Doel: Opvragen van alle records uit de tabellen Auto
--       en Verkoop
-- Versie: 01
-- Datum: 24-10-2024
-- Auteur: Arjan de Ruijter
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `jamin_a`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spGetAllAutoVerkoop;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllAutoVerkoop()
BEGIN
    
    SELECT   AUTO.Id                AS AutoId
            ,AUTO.Merk
            ,AUTO.Type
            ,VERK.Id                AS VerkoopId
            ,VERK.AutoId            AS VerkoopAutoId 
            ,VERK.AantalVerkocht
            ,VERK.Prijs

    FROM    Auto AS AUTO

    INNER JOIN  Verkoop AS VERK
            ON  AUTO.Id = VERK.AutoId
    
    ORDER BY VERK.Prijs DESC;
    

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllAutoVerkoop();

********************************************************/



