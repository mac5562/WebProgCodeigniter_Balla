/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  akos4
 * Created: Mar 2, 2020
 */

CREATE TABLE employees(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    ssn CHAR(9) NOT NULL,
    tin CHAR(10) NOT NULL,
    
    CONSTRAINT PK_employees PRIMARY KEY(id),
    CONSTRAINT UQ_employees_ssn UNIQUE(ssn),
    CONSTRAINT UQ_employees_tin UNIQUE(tin)
);

INSERT INTO employees(name, ssn, tin) 
VALUES('Fish Boi', '012345678', '0123456789');


INSERT INTO employees(name, ssn, tin) 
VALUES('OwO Man', '123456780', '1234567890');