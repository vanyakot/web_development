PROGRAM PrintName(INPUT, OUTPUT);
USES
  DOS;
VAR
  QueryString, Name: STRING;

FUNCTION FindParameters(InString, Parameter: STRING): STRING;
VAR
  ParameterFlag, Position: INTEGER;
  ParameterValue: STRING;
BEGIN
  ParameterValue := '';
  IF (Pos(Parameter, InString) = 1)
  THEN
    ParameterFlag := Pos(Parameter, InString)
  ELSE
    ParameterFlag := Pos('&' + Parameter, InString) + 1;

  IF ParameterFlag <> 0
  THEN
    BEGIN
      Position := ParameterFlag + Length(Parameter);
      WHILE (InString[Position] <> '&') AND (Position <= Length(InString))
      DO
        BEGIN
          ParameterValue := ParameterValue + InString[Position];
          Position := Position + 1
        END;
      IF ParameterValue <> ''
      THEN
        FindParameters := ParameterValue
      ElSE
        FindParameters := 'Not Found'
    END
  ELSE
    FindParameters := 'Not Found'
END;

BEGIN
  WRITELN('Conetent-Type: text/plain');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  Name := FindParameters(QueryString, 'name=');
  IF Name <> 'Not Found'
  THEN
    WRITE('Hello dear, ', Name, '!')
  ELSE
    WRITE('Hello Anonymous!')
END.

