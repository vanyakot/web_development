PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
VAR
  Lanterns: CHAR;
  QueryString: STRING;

FUNCTION FindParameters(InString, Parameter: STRING): CHAR;
VAR
  LanternsFlag: INTEGER;
BEGIN
  LanternsFlag := Pos(Parameter, InString);
  IF LanternsFlag <> 0
  THEN
    FindParameters := InString[LanternsFlag+Length(Parameter)]
  ELSE
    FindParameters := '0'
END;

BEGIN
  WRITELN('Conetent-Type: text/plain');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  Lanterns := FindParameters(QueryString, 'lanterns=');
  IF Lanterns = '1'
    THEN 
      WRITELN('The British are coming by land.')
    ELSE 
      IF Lanterns = '2'
      THEN 
        WRITELN('The British are coming by sea.')
      ELSE 
        WRITELN('Sarah said nothing.')
END.

