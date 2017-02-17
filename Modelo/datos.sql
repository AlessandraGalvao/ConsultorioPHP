Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (123,'Juanito','Perez',to_date('18-DEC-90','DD-MON-RR'),'M');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (666,'Judas','izcariote',to_date('31-OCT-16','DD-MON-RR'),'M');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (102030,'Andres','Benavides',to_date('18-DEC-87','DD-MON-RR'),'M');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (3876,'Gabriel','Arcangel',to_date('31-OCT-00','DD-MON-RR'),'F');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (8899,'Paola','Monsalve',to_date('15-DEC-99','DD-MON-RR'),'M');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (9876,'Paciente','de Prueba',to_date('03-NOV-16','DD-MON-RR'),'M');
Insert into PACIENTES (PACIDENTIFICACION,PACNOMBRES,PACAPELLIDOS,PACFECHANACIMIENTO,PACSEXO) values (555,'fransico','ocaña',to_date('25-DEC-99','DD-MON-RR'),'M');

Insert into MEDICOS (MEDIDENTIFICACION,MEDNOMBRE,MEDAPELLIDOS) values (777,'Mario Andres','Cortez');
Insert into MEDICOS (MEDIDENTIFICACION,MEDNOMBRE,MEDAPELLIDOS) values (12345,'Gustabo','Carvajal');
Insert into MEDICOS (MEDIDENTIFICACION,MEDNOMBRE,MEDAPELLIDOS) values (67890,'Maria','Eugenia');

Insert into CONSULTORIOS (CONNUMERO,CONNOMBRE) values (2,'Laboratorio');
Insert into CONSULTORIOS (CONNUMERO,CONNOMBRE) values (3,'Medicina General');
Insert into CONSULTORIOS (CONNUMERO,CONNOMBRE) values (1,'Consultas 1');

Insert into HORAS (HORA) values (to_date('8:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('8:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('8:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('9:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('9:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('9:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('10:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('10:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('10:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('11:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('11:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('11:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('14:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('14:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('14:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('15:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('15:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('15:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('16:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('16:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('16:40:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('17:00:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('17:20:00','hh24:mi:ss'));
Insert into HORAS (HORA) values (to_date('17:40:00','hh24:mi:ss'));

Insert into CITAS (CITFECHA,CITHORA,CITPACIENTE,CITMEDICO,CITCONSULTORIO,CITESTADO,CITOBSERVACIONES) values (to_date('06-DEC-16','DD-MON-RR'),to_date('8:20:00','hh24:mi:ss'),8899,777,1,'Solicitado','Ninguna');
Insert into CITAS (CITFECHA,CITHORA,CITPACIENTE,CITMEDICO,CITCONSULTORIO,CITESTADO,CITOBSERVACIONES) values (to_date('06-DEC-16','DD-MON-RR'),to_date('8:00:00','hh24:mi:ss'),102030,777,2,'Cancelado','Ninguna');
Insert into CITAS (CITFECHA,CITHORA,CITPACIENTE,CITMEDICO,CITCONSULTORIO,CITESTADO,CITOBSERVACIONES) values (to_date('07-DEC-16','DD-MON-RR'),to_date('9:20:00','hh24:mi:ss'),102030,777,3,'Solicitado','Ninguna');

Insert into USUARIOS (ID,USERNAME,PASSWORD,ROL) values (1,'andres','and123','paciente');
Insert into USUARIOS (ID,USERNAME,PASSWORD,ROL) values (2,'admin','admin123','admin');