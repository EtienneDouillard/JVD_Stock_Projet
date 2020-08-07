CREATE TRIGGER maj_even BEFORE INSERT ON lot 
FOR EACH ROW
BEGIN
    SET new.reference = upper(new.reference);
    SET new.emplacement = upper(new.emplacement);
END;