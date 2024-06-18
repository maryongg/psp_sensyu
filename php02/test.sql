INSERT INTO gs_an_table(id,name,email,age,naiyou,indate)VALUES(NULL,'test1','test1@test.jp',30,'test',sysdate());

INSERT INTO gs_an_table(id,name,email,age,naiyou,indate)VALUES(NULL,'test2','test2@test.jp',30,'test2',sysdate());

INSERT INTO gs_an_table(id,name,email,age,naiyou,indate)VALUES(NULL,'test2','test2@test.jp',30,'test2',sysdate());

INSERT INTO gs_an_table(id,name,email,age,naiyou,indate)VALUES(:name,:email,:age,:naiyou,sysdate());

SELECT*FROM gs_an_table;
SELECT id,name,indate FROM gs_an_table;
SELECT*FROM gs_an_table WHERE email LIKE'%test1%';

SELECT*FROM gs_an_table ORDER BY indate DESC LIMIT 3;