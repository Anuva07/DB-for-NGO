Create sequence personid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Person(
Person_Id VARCHAR2(35),
F_Name VARCHAR2(25) NOT NULL,
L_Name VARCHAR2(25) NOT NULL,
DOB DATE NOT NULL,
Road VARCHAR2 (30) NOT NULL,
House VARCHAR2 (30) NOT NULL,
City VARCHAR2 (30) NOT NULL,
Country VARCHAR2 (20) NOT NULL,
NID VARCHAR2 (20), 
Div_license VARCHAR2 (25),
Passport VARCHAR2 (40),
TIN VARCHAR2 (40),
Gender VARCHAR2 (10) NOT NULL,

Email_Id VARCHAR2 (50),
Picture  blob,
Religion VARCHAR2 (10) NOT NULL,
Nationality VARCHAR2 (20) NOT NULL,
Birth_Certificate VARCHAR2 (30) NOT NULL,
Postal_Code VARCHAR2 (20) NOT NULL,
Bank_Name varchar2(20),
Bank_acct_no VARCHAR2 (30),
Bank_address VARCHAR2 (30),
Father_Name VARCHAR2 (40) NOT NULL,
Mother_Name VARCHAR2 (40) NOT NULL,
Father_Occu VARCHAR2 (30),
Fathers_Salary VARCHAR2 (30),
Spouse VARCHAR2 (40),
Anniversary VARCHAR2 (30),
ChildNum number(10),
Spouse_Prof VARCHAR2 (30),
Blood_gp VARCHAR2 (10) NOT NULL,
Height VARCHAR2 (20)  NOT NULL,
Weight VARCHAR2 (20) NOT NULL,

CONSTRAINT Person_Person_Id_pk PRIMARY KEY(Person_Id),
CONSTRAINT Person_Height_ck CHECK(Height>0),
CONSTRAINT Person_Weight_ck CHECK(Weight>0),
CONSTRAINT Person_BirCer_uk UNIQUE(Birth_Certificate),
CONSTRAINT Person_BankAcc_uk UNIQUE(Bank_acct_no),
CONSTRAINT Person_NID_uk UNIQUE(NID),
CONSTRAINT Person_TIN_uk UNIQUE(TIN),
CONSTRAINT Person_DivLi_uk UNIQUE(Div_license),
CONSTRAINT Person_Passport_uk UNIQUE(Passport),
--CONSTRAINT Person_DOB_ck CHECK(DOB<CURDATE),

);

CREATE Table Phone(
Phone VARCHAR2 (20),
Person_Id VARCHAR2 (30),
CONSTRAINT Phn_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE
);

CREATE TABLE Employee(
Person_Id VARCHAR2 (30),
Position_rank VARCHAR2 (40) NOT NULL,
Join_date DATE NOT NULL,
End_Date date ,

CONSTRAINT Emp_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
--CONSTRAINT Employee_Join_date_ck CHECK (Join_date<=SYSDATE),
CONSTRAINT Employee_End_date_ck CHECK (End_date>Join_date),
--CONSTRAINT Employee_End_date_ck CHECK (End_date>=SYSDATE)

);

CREATE TABLE Beneficiaries(
Person_Id VARCHAR2(30),
Limitations VARCHAR2(40),
Present_status VARCHAR2(40) NOT NULL,
Blood_Pressure VARCHAR2(30),
Sugar_Level varchar2(30),

CONSTRAINT Bene_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);


CREATE TABLE Donar(
Person_Id VARCHAR2(30),
Type_of_Donar VARCHAR2 (30),
Donation_Type VARCHAR2 (30),
Date_of_Donation date,
Donation_Amount number(30),

CONSTRAINT Donar_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE


);


CREATE TABLE Volunteer(
Person_Id VARCHAR2(30),

CONSTRAINT Vol_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);




CREATE TABLE Trainer(
Person_Id VARCHAR2(30),
Join_date Date NOT NULL,
End_date Date,

CONSTRAINT Trainer_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE
CONSTRAINT Trainer_Join_date_ck CHECK(Join_date<=SYSDATE)

);



CREATE TABLE Publication(
Pub_id VARCHAR2(30),
Pub_name VARCHAR2(40) NOT NULL,
Pub_date DATE NOT NULL,
Publisher VARCHAR2(40) NOT NULL,
Pub_type VARCHAR2(40) NOT NULL,
Pub_attachment VARCHAR2(100),

CONSTRAINT Publication_Pub_Id_pk PRIMARY KEY(Pub_Id),
CONSTRAINT Publication_Pub_date_ck CHECK (Pub_date<=SYSDATE)
);

Create sequence publicationid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Project
(
P_Id varchar2 (30),
P_name VARCHAR2 (40) NOT NULL,
Start_Date Date NOT NULL,
End_Date Date,
Road VARCHAR2 (30) NOT NULL,
House VARCHAR2 (30) NOT NULL,
City VARCHAR2 (30) NOT NULL,
Country VARCHAR2 (20),
Postal_Code varchar2(20) NOT NULL,
Budget NUMBER (30) NOT NULL,
Proj_Coord VARCHAR2 (50) NOT NULL,
P_Fund number(30) NOT NULL,

CONSTRAINT Project_P_Id_pk PRIMARY KEY(P_Id),
CONSTRAINT Project_Budget_ch CHECK (Budget>0),
CONSTRAINT Project_P_Fund_ch CHECK (P_Fund>=0),
CONSTRAINT Project_P_End_Date_ch CHECK (End_Date>Start_Date)

);


Create sequence projectid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Health_Proj(
P_Id VARCHAR2 (30),
Given_service VARCHAR2(40) NOT NULL,
Donated_mat VARCHAR2(40) NOT NULL,
Amount_mat VARCHAR2(40) NOT NULL,

CONSTRAINT HealProj_PID_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Health_Proj_Amount_mat_ck CHECK(Amount_mat>0)

);




CREATE TABLE W_Micro_Credit(
P_Id VARCHAR2(30),
Num_Installment VARCHAR2(30) NOT NULL,
Duration NUMBER(30) NOT NULL,	--in years
Rate NUMBER (30) NOT NULL,		--in percentage
Amount NUMBER (30) NOT NULL,	--total amount

CONSTRAINT WMicCred_PID_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT W_Micro_CreditNumInstal_ck CHECK(Num_Installment>0),
CONSTRAINT W_Micro_Credit_Duration_ck CHECK(Duration>0),
CONSTRAINT W_Micro_Credit_Rate_ck CHECK(Rate>0),
CONSTRAINT W_Micro_Credit_Amount_ck CHECK(Amount>0)

);


CREATE TABLE Women_Emp_Seminar(
P_Id VARCHAR2(30),
Seminar_Subj VARCHAR2 (40) NOT NULL,
Chief_Guest VARCHAR2(40) NOT NULL,
Special_Guest VARCHAR2(40) NOT NULL,

CONSTRAINT WEmpSem_PID_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE
--CONSTRAINT W_Emp_Sem_SemTime_ck CHECK(Seminar_Time<=SYSDATE)
--sysdate problem
);




CREATE TABLE Proj_Training(
P_Id VARCHAR2(30),
T_Type VARCHAR2(30) NOT NULL,
Student_No NUMBER(20) NOT NULL,

CONSTRAINT ProjTraining_PID_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Proj_Training_Student_No_ck CHECK(Student_No>0)

);


CREATE TABLE Education_qual(
Person_Id VARCHAR2(30),
Exam_Name VARCHAR2(30) NOT NULL,
Passing_yr DATE NOT NULL,
ExamResult NUMBER(10) NOT NULL,
ExamGroup VARCHAR2(10),
Board_University VARCHAR2(40),
Inst_University VARCHAR2(40),
ExamSession VARCHAR2 (30) NOT NULL,

CONSTRAINT EduQual_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE
--CONSTRAINT Education_qual_Passing_yr_ck CHECK (Passing_yr<=SYSDATE)

);


CREATE TABLE Training(
Person_Id VARCHAR2(35),
Training_name VARCHAR2 (40) NOT NULL,
Org_Name VARCHAR2 (40) NOT NULL,
Org_Addr VARCHAR2 (40) NOT NULL,
TrainingResult VARCHAR2 (10) NOT NULL,
Duration  NUMBER (20) ,	
TrainingSession VARCHAR2(30) NOT NULL,

CONSTRAINT Training_PersonID_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Training_Duration_ck CHECK(Duration>0)

);


CREATE TABLE Person_Project(
P_Id VARCHAR2 (30),
Person_Id VARCHAR2 (30),

CONSTRAINT Person_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Person_Project_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);


CREATE TABLE Person_Publication(
Pub_id VARCHAR2 (30),
Person_Id VARCHAR2 (30),

CONSTRAINT Person_Pub_Pub_Id_fk FOREIGN KEY(Pub_id) REFERENCES Publication(Pub_id) ON DELETE CASCADE,
CONSTRAINT Person_Pub_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);


CREATE TABLE Branch(
Br_Id VARCHAR2 (30),
Br_Name VARCHAR2 (40) NOT NULL,
O_Fund NUMBER (30) NOT NULL,
Br_Senior VARCHAR2 (40) NOT NULL,
Road VARCHAR2 (20) NOT NULL,
House VARCHAR2 (20) NOT NULL,
City VARCHAR2 (30) NOT NULL,
Country VARCHAR2 (20) NOT NULL,
Postal_Code varchar2(20) NOT NULL,
Email_Id varchar2(20) NOT NULL,
Phone varchar2(20) NOT NULL,

CONSTRAINT Branch_Br_Id_pk PRIMARY KEY(Br_Id),
CONSTRAINT Branch_O_Fund_ck CHECK(O_Fund>=0)

);

Create sequence branchid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Branch_Project(
P_id VARCHAR2 (30),
Br_id VARCHAR2 (30),

CONSTRAINT Branch_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Project_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Assets(
Asset_Id VARCHAR2 (30),
Asset_Type VARCHAR2 (30) NOT NULL,
Buying_date DATE NOT NULL,
Quantity NUMBER (30) NOT NULL,
Total_Price NUMBER (30) NOT NULL,

CONSTRAINT Assets_Asset_Id_pk PRIMARY KEY(Asset_Id),
CONSTRAINT Assets_Quantity_ck CHECK (Quantity>0),
--CONSTRAINT Assets_Buying_date_ck CHECK (Buying_date<SYSDATE),
CONSTRAINT Assets_Total_Price_ck CHECK (Total_Price>0)

);

Create sequence assetid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Branch_Asset(
Asset_Id VARCHAR2 (30),
Br_Id VARCHAR2 (30),

CONSTRAINT Branch_Asset_AssetId_fk FOREIGN KEY(Asset_Id) REFERENCES Assets(Asset_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Asset_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Asset
(
Asset_id VARCHAR2 (30),
P_id VARCHAR2 (30),

CONSTRAINT Project_Asset_Asset_Id_fk FOREIGN KEY(Asset_Id) REFERENCES Assets(Asset_Id) ON DELETE CASCADE,
CONSTRAINT Project_Asset_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE

);

CREATE TYPE RefAddr AS OBJECT (
  road  VARCHAR2(200),
  house    VARCHAR2(200),
  city   varCHAR2(20),
country   varCHAR2(20),
  postal_code     VARCHAR2(20)
  ) ;

CREATE TABLE Ref_relation(
Person_Id varchar2(30),
Ref_id VARCHAR2 (30),
Ref_name VARCHAR2 (30) NOT NULL,
Ref_email VARCHAR2(30) NOT NULL,
Ref_Phone_No VARCHAR2 (30)	NOT NULL,
RefAddress RefAddr NOT NULL,

CONSTRAINT Ref_Realtion_Ref_Id_pk PRIMARY KEY(Ref_Id),
CONSTRAINT Ref_Rel_PersonId_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);

Create sequence refid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Branch_Publication(
Pub_id VARCHAR2 (30),
Br_id VARCHAR2 (30),

CONSTRAINT Branch_Publication_Pub_Id_fk FOREIGN KEY(Pub_Id) REFERENCES Publication(Pub_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Publication_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Expenditure(
ExpTrans_Id VARCHAR2 (30),
Exp_date date,
House_Rent NUMBER (30),
Electricity NUMBER(30),
Water NUMBER (30),
Internet NUMBER (30),
Others NUMBER (30),

CONSTRAINT Expenditure_ExpTrans_Id_pk PRIMARY KEY(ExpTrans_Id),
CONSTRAINT Expenditure_House_Rent_ck CHECK (House_Rent>0),
CONSTRAINT Expenditure_Electricity_ck CHECK (Electricity>0),
CONSTRAINT Expenditure_Water_ck CHECK (Water>0),
CONSTRAINT Expenditure_Internet_ck CHECK (Internet>0),
CONSTRAINT Expenditure_Others_ck CHECK (Others>0)

);

Create sequence exptransid_sequence start with 1
increment by 1
minvalue 1
maxvalue 1000000;


CREATE TABLE Branch_Expense(
Br_Id VARCHAR2 (30),
ExpTrans_Id VARCHAR2 (30),

CONSTRAINT Branch_Expense_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Expense_Exp_Id_fk FOREIGN KEY(ExpTrans_Id) REFERENCES Expenditure(ExpTrans_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Expenditure
(
P_id VARCHAR2 (30),
ExpTrans_id VARCHAR2 (30),

CONSTRAINT Project_Expenditure_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Exp_ExpTrans_Id_fk FOREIGN KEY(ExpTrans_Id) REFERENCES Expenditure(ExpTrans_Id) ON DELETE CASCADE

);


CREATE TABLE Current_job(
Person_Id VARCHAR2 (30),
Type VARCHAR2 (30) NOT NULL,
Monthy_income number(30) NOT NULL,
No_of_Worker number(30),
Start_dt date NOT NULL,
End_dt date,
Office_Addr VARCHAR2 (30) NOT NULL,

CONSTRAINT CurJob_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Current_job_Monthly_income_ck CHECK(Monthy_income>=0),
CONSTRAINT Current_job_No_of_Worker_ck CHECK(No_of_Worker>0),
--CONSTRAINT Current_job_Start_dt_ck CHECK(Start_dt<=SYSDATE),
--CONSTRAINT Current_job_End_dt_ck CHECK(End_dt>=SYSDATE),
CONSTRAINT Cur_job_End_dt_ck CHECK(End_dt>Start_dt)

);


CREATE TABLE Salary(
Account VARCHAR2 (30),
Bonus_Amount NUMBER (30),
B_Date Date,
Bonus_name VARCHAR2 (30),
Basic_Pay NUMBER (30) NOT NULL,
House_Alice NUMBER (30) NOT NULL,
Utsob_Alice NUMBER (30) NOT NULL,
Govt_Tax NUMBER (30) NOT NULL,
Med_Alice NUMBER (30) NOT NULL,
Prov_Fund_Cutting NUMBER (30) NOT NULL,

--CONSTRAINT Salary_Account PRIMARY KEY(Account),
CONSTRAINT Salary_Bonus_Amount_ck CHECK(Bonus_Amount>=0),
CONSTRAINT Salary_Basic_Pay_ck CHECK(Basic_Pay>0),
CONSTRAINT Salary_House_Alice_ck CHECK(House_Alice>=0),
CONSTRAINT Salary_Utsob_Alice_ck CHECK(Utsob_Alice>0),
CONSTRAINT Salary_Govt_Tax_ck CHECK(Govt_Tax>0),
CONSTRAINT Salary_Med_Alice_ck CHECK(Med_Alice>0),
CONSTRAINT Salary_Prov_Fund_Cutting_ck CHECK(Prov_Fund_Cutting>=0)

);


CREATE TABLE Employee_Branch(
Person_id VARCHAR2(30),
Br_id VARCHAR2(30),

CONSTRAINT Employee_Branch_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Branch_Empl_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE

);


--view
--1
CREATE VIEW ProjectExpanseSum("Project ID","Total House Rent Cost","Total Electricity Cost","Total Water Cost","Total Internet Cost","Total Others Cost")AS SELECT Project_Expenditure.P_Id,Sum(House_rent),SUM(Electricity),SUM(Water),SUm(Internet),SUm(Others) FROM Expenditure,Project_Expenditure WHERE Expenditure.ExpTrans_id=Project_Expenditure.ExpTrans_id GROUP BY(p_iD)

--2
CREATE VIEW BranchExpanseSum("Branch ID","Total House Rent Cost","Total Electricity Cost","Total Water Cost","Total Internet Cost","Total Others Cost")AS SELECT Branch_Expense.Br_Id,Sum(House_rent),SUM(Electricity),SUM(Water),SUm(Internet),SUm(Others) FROM Expenditure,Branch_Expense WHERE Expenditure.ExpTrans_id=Branch_Expense.ExpTrans_id GROUP BY(Br_iD)


--trigger+exception
--1(microcredit)
create or replace trigger W_Micro_Credit_trigger
before update or insert on W_Micro_Credit
for each row
when (new.Amount > 20000)
declare
high_micro_credit exception;
begin
raise high_micro_credit;
exception
when high_micro_credit
then RAISE_APPLICATION_ERROR(-20000, 'Please Lower The Amount');
end;

--2(cant edit person on friday)(kept disable nahole kaj kortese partese na)
create or replace trigger person_input_trigger
before update or insert or delete on person
begin
if(to_char(sysdate,'day') IN ('friday')) or (to_char(sysdate, 'HH24:MI:SS') not between '9:00' and '18:00')
then 
RAISE_APPLICATION_ERROR(-20043, 'You Are Not Allowed Now');
end if;
end;

--3(fund<500 not allowed)
create or replace trigger project_fund_trigger
before update or insert on project
for each row
when (new.p_fund < 500)
declare
fund_shortage exception;
begin
raise fund_shortage;
exception
when fund_shortage
then RAISE_APPLICATION_ERROR(-20000, 'There is a shortage in fund');
end;


--cursor
--1(no front end)
Declare 
Cursor Donar_Project_cursor
IS
select F_Name,L_Name,Nationality,Type_of_Donar,Donation_Type
from Person join Donar using(Person_id);
 
Donar_Info Donar_Project_cursor%ROWTYPE; 
BEGIN
Open Donar_Project_cursor;
LOOP FETCH Donar_Project_cursor Into Donar_Info;
EXIT WHEN Donar_Project_cursor%NOTFOUND;
IF (INITCAP(Donar_Info.Nationality)='Bangladeshi')
then
DBMS_OUTPUT.PUT_LINE(Donar_Info.F_Name ||'  '|| Donar_Info.L_Name ||'is a domestric Donar and donetion type is '||Donar_Info.Donation_Type);
else
DBMS_OUTPUT.PUT_LINE(Donar_Info.F_Name ||'  '|| Donar_Info.L_Name ||'is a international Donar and donetion type is '||Donar_Info.Donation_Type);
END IF;
END LOOP;
CLOSE Donar_Project_cursor;
END;














































































































































































































































































/*
CREATE TABLE Expenditure(
Exp_Id VARCHAR2 (30),
House_Rent NUMBER (30),
Electricity NUMBER(30),
Water NUMBER (30),
Internet NUMBER (30),
Others NUMBER (30),

CONSTRAINT Expenditure_Exp_Id_pk PRIMARY KEY(Exp_Id),
CONSTRAINT Expenditure_House_Rent_ck CHECK (House_Rent>0),
CONSTRAINT Expenditure_Electricity_ck CHECK (Electricity>0),
CONSTRAINT Expenditure_Water_ck CHECK (Water>0),
CONSTRAINT Expenditure_Internet_ck CHECK (Internet>0),
CONSTRAINT Expenditure_Others_ck CHECK (Others>0)

);


CREATE TABLE Volunteer_Project(
V_Id VARCHAR2 (30),
P_Id VARCHAR2 (30),

CONSTRAINT Volunteer_Project_V_Id_fk FOREIGN KEY(V_Id) REFERENCES Volunteer(V_Id) ON DELETE CASCADE,
CONSTRAINT Volunteer_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Training(
Training_Id VARCHAR2 (30),
T_Id VARCHAR2 (30),

CONSTRAINT Trainer_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE,
CONSTRAINT Trainer_Training_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Education_Qual(
E_Id VARCHAR2 (30),
T_Id VARCHAR2 (30),

CONSTRAINT Trainer_Education_Qual_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Education_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Trainer_Education_Qual_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Trainer(
P_Id VARCHAR2 (30),
T_Id VARCHAR2 (30),

CONSTRAINT Project_Trainer_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Trainer_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Salary(
Account VARCHAR2 (30),
T_Id VARCHAR2 (30),

CONSTRAINT Trainer_Salary_Account_fk FOREIGN KEY(Account) REFERENCES Salary(Account) ON DELETE CASCADE,
CONSTRAINT Trainer_Salary_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Donar_Project(
P_Id VARCHAR2 (30),
D_Id VARCHAR2 (30),

CONSTRAINT Donar_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Donar_Project_D_Id_fk FOREIGN KEY(D_Id) REFERENCES Donar(D_Id) ON DELETE CASCADE

);


CREATE TABLE Employee_Education(
E_Id VARCHAR2(30),
Empl_Id VARCHAR2(30),

CONSTRAINT Employee_Education_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Education_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Education_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Employee_Publication(
Empl_id VARCHAR2(30),
Pub_id VARCHAR2(30),

CONSTRAINT Employee_Publication_Pub_Id_fk FOREIGN KEY(Pub_Id) REFERENCES Publication(Pub_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Publication_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);





CREATE TABLE Empl_Salary(
Empl_id VARCHAR2(30),
Account VARCHAR2(30),

CONSTRAINT Empl_Salary_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE,
CONSTRAINT Emply_Salary_Account_fk FOREIGN KEY(Account) REFERENCES Salary(Account) ON DELETE CASCADE

);


CREATE TABLE Empl_Training(
Empl_id VARCHAR2(30),
Training_Id VARCHAR2(30),

CONSTRAINT Empl_Training_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE,
CONSTRAINT Emply_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE

);


CREATE TABLE Beneficiary_Education_Qual(
E_Id VARCHAR2 (30),
B_Id VARCHAR2 (30),

CONSTRAINT Beneficiary_Education_Qual_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Eeducation_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiary_Education_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE

);


CREATE TABLE Employee_Ref(
Ref_id VARCHAR2(30),
Empl_id VARCHAR2(30),

CONSTRAINT Employee_Ref_Ref_Id_fk FOREIGN KEY(Ref_Id) REFERENCES Ref_relation(Ref_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Ref_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);



CREATE TABLE Employee_Project(
P_id VARCHAR2 (30),
Empl_id VARCHAR2(30),

CONSTRAINT Employee_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Project_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Beneficiaries(
P_id VARCHAR2 (30),
B_id VARCHAR2 (30),

CONSTRAINT Project_Beneficiaries_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Beneficiaries_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE

);


CREATE TABLE Proj_Mat_Exp_Rel(
P_Id VARCHAR2 (30),
P_Expense_Id VARCHAR2 (30),

CONSTRAINT Proj_Mat_Exp_Rel_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Proj_Mat_Exp_Rel_P_Expense_Id_fk FOREIGN KEY(P_Expense_Id) REFERENCES Proj_Mat_Expense(P_Expense_Id) ON DELETE CASCADE

);


CREATE TABLE Beneficiary_Training(
Training_Id VARCHAR2 (30),
B_Id VARCHAR2 (30),

CONSTRAINT Beneficiary_Training_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiary_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE

);



CREATE TABLE Beneficiaries_Job
(
B_id VARCHAR2 (30),
Job_id VARCHAR2 (30),

CONSTRAINT Beneficiaries_Job_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiaries_Job_Job_Id_fk FOREIGN KEY(Job_Id) REFERENCES Current_job(Job_Id) ON DELETE CASCADE

);

CREATE TABLE Proj_Mat_Expense(
P_Expense_Id VARCHAR2 (30),
Amount number(30) NOT NULL,
Exp_Type VARCHAR2 (30) NOT NULL,

CONSTRAINT Proj_Mat_Expense_P_Expense_Id_pk PRIMARY KEY(P_Expense_Id),
CONSTRAINT Proj_Mat_Expense_Amount_ck CHECK(Amount>0)

);



CREATE TABLE Health_Proj(
Health_Proj_Id VARCHAR2 (30),
Given_service VARCHAR2(40) NOT NULL,
Donated_mat VARCHAR2(40) NOT NULL,
Amount_mat VARCHAR2(40) NOT NULL,

CONSTRAINT Health_Proj_Health_Proj_Id_pk PRIMARY KEY(Health_Proj_Id),
CONSTRAINT Health_Proj_Amount_mat_ck CHECK(Amount_mat>0)

);

*/









