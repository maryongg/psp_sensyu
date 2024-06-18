INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('A','t01@com',20,'あ',sysdate());
INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('B','t02@com',20,'あ',sysdate());
INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('C','t03@com',20,'あ',sysdate());
INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('D','t04@com',20,'あ',sysdate());
INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES('E','t10@com',20,'あ',sysdate());

SELECT * FROM gs_an_table;
SELECT name,email FROM gs_an_table;

SELECT * FROM gs_an_table WHERE email LIKE '%1%';

SELECT * FROM gs_an_table ORDER BY indate 

SELECT * FROM gs_an_table ORDER BY indate DESC;
SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 3;


INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES(:name,:email,:age,:naiyou,sysdate());