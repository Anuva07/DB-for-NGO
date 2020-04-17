CREATE TABLE Person(
Person_Id varchar2(255),
F_Name varchar2(255) NOT NULL,
L_Name varchar2(255) NOT NULL,
DOB date NOT NULL,
Road varchar2(255) NOT NULL,
House varchar2(255) NOT NULL,
City varchar2(255) NOT NULL,
Country varchar2(255) NOT NULL,
NID varchar2(255) NOT NULL,
Div_license varchar2(255),
Passport varchar2(255),
TIN varchar2(255),
Gender varchar2(255) NOT NULL,
Phone varchar2(255) NOT NULL,
Email_Id varchar2(255) NOT NULL,
Picture  NOT NULL,
Religion varchar2(255) NOT NULL,
Nationality varchar2(255) NOT NULL,
Birth_Certificate varchar2(255) NOT NULL,
Postal_Code varchar2(255) NOT NULL,
Bank_acct_no varchar2(255) NOT NULL,
Bank_address varchar2(255) NOT NULL,
Father_Name varchar2(255) NOT NULL,
Mother_Name varchar2(255) NOT NULL,
Father_Occu varchar2(255) NOT NULL,
Fathers_Salary varchar2(255),
Spouse varchar2(255),
Anniversary varchar2(255),
Spouse_Prof varchar2(255),
Blood_gp varchar2(255) NOT NULL,
Height varchar2 NOT NULL,
Weight varchar2 NOT NULL,

CONSTRAINT Person_Person_Id_pk PRIMARY KEY(Person_Id),
CONSTRAINT Person_Height_ck CHECK(Height>0),
CONSTRAINT Person_Weight_ck CHECK(Weight>0),
CONSTRAINT Person_DOB_ck CHECK(DOB<SYSDATE)

);


CREATE TABLE Salary(
Account varchar2(255),
Bonus_Amount number(255),
B_Date varchar2(255),
Bonus_name varchar2(255),
Basic_Pay number(255) NOT NULL,
House_Alice number(255) NOT NULL,
Utsob_Alice number(255) NOT NULL,
Govt_Tax number(255) NOT NULL,
Med_Alice number(255) NOT NULL,
Prov_Fund_Cutting number(255) NOT NULL,

CONSTRAINT Salary_Account PRIMARY KEY(Account),
CONSTRAINT Salary_Bonus_Amount_ck CHECK(Bonus_Amount>=0),
CONSTRAINT Salary_Basic_Pay_ck CHECK(Basic_Pay>0),
CONSTRAINT Salary_House_Alice_ck CHECK(House_Alice>=0),
CONSTRAINT Salary_Utsob_Alice_ck CHECK(Utsob_Alice>0),
CONSTRAINT Salary_Govt_Tax_ck CHECK(Govt_Tax>0),
CONSTRAINT Salary_Med_Alice_ck CHECK(Med_Alice>0),
CONSTRAINT Salary_Prov_Fund_Cutting_ck CHECK(Prov_Fund_Cutting>=0)

);


CREATE TABLE Branch(
Br_Id varchar2(255),
Br_Name varchar2(255) NOT NULL,
O_Fund number(255) NOT NULL,
Road varchar2(255) NOT NULL,
House varchar2(255) NOT NULL,
City varchar2(255) NOT NULL,
Country varchar2(255) NOT NULL,
Br_Senior varchar2(255) NOT NULL,

CONSTRAINT Branch_Br_Id_pk PRIMARY KEY(Br_Id),
CONSTRAINT Branch_O_Fund_ck CHECK(O_Fund>=0)

);


CREATE TABLE Person_Volunteer(
Person_Id varchar2(255),
V_ID varchar2(255),

CONSTRAINT Person_Volunteer_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Person_Volunteer_V_Id_fk FOREIGN KEY(V_Id) REFERENCES Volunteer(V_Id) ON DELETE CASCADE

);


CREATE TABLE Person_Trainer(
Person_Id varchar2(255),
T_Id varchar2(255),

CONSTRAINT Person_Trainer_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Person_Trainer_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer(
T_Id varchar2(255),
Join_date varchar2(255) NOT NULL,
End_date varchar2(255),

CONSTRAINT Trainer_T_Id_pk PRIMARY KEY(T_Id),
CONSTRAINT Trainer_Join_date_ck CHECK(Join_date<=SYSDATE)

);


CREATE TABLE Person_Employee(
Person_Id varchar2(255),
Empl_Id varchar2(255),

CONSTRAINT Person_Employee_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Person_Employee_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Person_Donar(
Person_Id varchar2(255),
D_Id varchar2(255),

CONSTRAINT Person_Donar_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Person_Donar_D_Id_fk FOREIGN KEY(D_Id) REFERENCES Donar(D_Id) ON DELETE CASCADE

);


CREATE TABLE Donar(
D_Id varchar2(100),
Type_of_Donar varchar2(100),
Donation_Type varchar2(255),

CONSTRAINT Donar_D_Id_pk PRIMARY KEY(D_Id)

);


CREATE TABLE Person_Beneficiary(
Person_Id varchar2(255),
B_Id varchar2(255),

CONSTRAINT Person_Beneficiary_Person_Id_fk FOREIGN KEY(Person_Id) REFERENCES Person(Person_Id) ON DELETE CASCADE,
CONSTRAINT Person_Beneficiary_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE

);


CREATE TABLE Branch_Expense(
Br_Id varchar2(255),
Exp_Id varchar2(255),

CONSTRAINT Branch_Expense_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Expense_Exp_Id_fk FOREIGN KEY(Exp_Id) REFERENCES Expenditure(Exp_Id) ON DELETE CASCADE

);


CREATE TABLE Expenditure(
Exp_Id varchar2(255),
House_Rent number(255),
Electricity number(255),
Water number(255),
Internet number(255),
Others number(255),

CONSTRAINT Expenditure_Exp_Id_pk PRIMARY KEY(Exp_Id),
CONSTRAINT Expenditure_House_Rent_ck CHECK (House_Rent>0),
CONSTRAINT Expenditure_Electricity_ck CHECK (Electricity>0),
CONSTRAINT Expenditure_Water_ck CHECK (Water>0),
CONSTRAINT Expenditure_Internet_ck CHECK (Internet>0),
CONSTRAINT Expenditure_Others_ck CHECK (Others>0)

);


CREATE TABLE Branch_Asset(
Asset_Id varchar2(255),
Br_Id varchar2(255),

CONSTRAINT Branch_Asset_AssetId_fk FOREIGN KEY(Asset_Id) REFERENCES Assets(Asset_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Asset_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Volunteer(
V_Id varchar(150),

CONSTRAINT Volunteer_V_Id_pk PRIMARY KEY(V_Id)

);


CREATE TABLE Volunteer_Project(
V_Id varchar2(255),
P_Id varchar2(255),

CONSTRAINT Volunteer_Project_V_Id_fk FOREIGN KEY(V_Id) REFERENCES Volunteer(V_Id) ON DELETE CASCADE,
CONSTRAINT Volunteer_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Training(
Training_Id varchar2(255),
T_Id varchar2(255),

CONSTRAINT Trainer_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE,
CONSTRAINT Trainer_Training_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Education_Qual(
E_Id varchar2(255),
T_Id varchar2(255),

CONSTRAINT Trainer_Education_Qual_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Education_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Trainer_Education_Qual_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Trainer(
P_Id varchar2(255),
T_Id varchar2(255),

CONSTRAINT Project_Trainer_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Trainer_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Trainer_Salary(
Account varchar2(255),
T_Id varchar2(255),

CONSTRAINT Trainer_Salary_Account_fk FOREIGN KEY(Account) REFERENCES Salary(Account) ON DELETE CASCADE,
CONSTRAINT Trainer_Salary_T_Id_fk FOREIGN KEY(T_Id) REFERENCES Trainer(T_Id) ON DELETE CASCADE

);


CREATE TABLE Donar_Project(
P_Id varchar2(255),
D_Id varchar2(255),

CONSTRAINT Donar_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Donar_Project_D_Id_fk FOREIGN KEY(D_Id) REFERENCES Donar(D_Id) ON DELETE CASCADE

);


CREATE TABLE Branch_Project(
P_id varchar2(255),
Br_id varchar2(255)

CONSTRAINT Branch_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Project_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Expenditure
(
P_id NUMBER(100),
Exp_id NUMBER(100),

CONSTRAINT Project_Expenditure_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Expenditure_Exp_Id_fk FOREIGN KEY(Exp_Id) REFERENCES Expenditure(Exp_Id) ON DELETE CASCADE

);


CREATE TABLE Training(
Training_Id varchar2(100),
Training_name varchar2(255) NOT NULL,
Org_Name varchar2(255) NOT NULL,
Org_Addr varchar2(255) NOT NULL,
Result varchar2(255) NOT NULL,
Duratuion number(255) NOT NULL,	--in hours input
Session varchar2(255) NOT NULL,

CONSTRAINT Training_Training_Id_pk PRIMARY KEY(Training_Id),
CONSTRAINT Training_Duration_ck CHECK(Duratuion>0)

);


CREATE TABLE Education_qual(
E_Id varchar2(255),
Exam_Name varchar2(255) NOT NULL,
Passing_yr date NOT NULL,
Result number(255) NOT NULL,
Group varchar2(255) NOT NULL,
Board_University varchar2(255) NOT NULL,
Inst_University varchar2(255) NOT NULL,
Session number(255) NOT NULL,

CONSTRAINT Education_qual_E_Id_pk PRIMARY KEY(E_Id),
CONSTRAINT Education_qual_Passing_yr_ck CHECK (Passing_yr<=SYSDATE)

);


CREATE TABLE Employee_Education(
E_Id varchar2(255),
Empl_Id varchar2(255),

CONSTRAINT Employee_Education_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Education_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Education_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Employee_Publication(
Empl_id varchar2(255),
Pub_id varchar2(255),

CONSTRAINT Employee_Publication_Pub_Id_fk FOREIGN KEY(Pub_Id) REFERENCES Publication(Pub_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Publication_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Publication(
Pub_id VARCHAR2(100),
Pub_name VARCHAR2(255) NOT NULL,
Pub_date DATE NOT NULL,
Publisher VARCHAR2(40) NOT NULL,
Pub_type VARCHAR2(100) NOT NULL,
Pub_attachment VARCHAR2(255),

CONSTRAINT Publication_Pub_Id_pk PRIMARY KEY(Pub_Id),
CONSTRAINT Publication_Pub_date_ck CHECK (Pub_date<=SYSDATE)
);


CREATE TABLE Branch_Publication(
Pub_id varchar2(255),
Br_id varchar2(255),

CONSTRAINT Branch_Publication_Pub_Id_fk FOREIGN KEY(Pub_Id) REFERENCES Publication(Pub_Id) ON DELETE CASCADE,
CONSTRAINT Branch_Publication_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch_details(Br_Id) ON DELETE CASCADE

);


CREATE TABLE Employee_Branch(
Empl_id varchar2(255),
Br_id varchar2(255),

CONSTRAINT Employee_Branch_Br_Id_fk FOREIGN KEY(Br_Id) REFERENCES Branch(Br_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Branch_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Empl_Salary(
Empl_id varchar2(255),
Account varchar2(255),

CONSTRAINT Empl_Salary_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE,
CONSTRAINT Emply_Salary_Account_fk FOREIGN KEY(Account) REFERENCES Salary(Account) ON DELETE CASCADE

);


CREATE TABLE Project
(
P_Id varchar2 (255),
P_name VARCHAR2 (50) NOT NULL,
Start_Date Date NOT NULL,
End_Date Date NOT NULL,
Location VARCHAR2 (100) NOT NULL,
Budget NUMBER (30) NOT NULL,
Proj_Coord VARCHAR2 (50) NOT NULL,
P_Fund number(255) NOT NULL,

CONSTRAINT Project_P_Id_pk PRIMARY KEY(P_Id),
CONSTRAINT Project_Budget_ch CHECK (Budget>0),
CONSTRAINT Project_P_Fund_ch CHECK (P_Fund>=0),

);


CREATE TABLE Project_Asset
(
Asset_id NUMBER (100),
P_id NUMBER (100),

CONSTRAINT Project_Asset_Asset_Id_fk FOREIGN KEY(Asset_Id) REFERENCES Assets(Asset_Id) ON DELETE CASCADE,
CONSTRAINT Project_Asset_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE

);

CREATE TABLE Assets(
Asset_Id varchar2(255),
Asset_Type varchar2(255) NOT NULL,
Buying_date date NOT NULL,
Quantity number(255) NOT NULL,
Total_Price number(255) NOT NULL,

CONSTRAINT Assets_Asset_Id_pk PRIMARY KEY(Asset_Id),
CONSTRAINT Assets_Quantity_ck CHECK (Quantity>0),
CONSTRAINT Assets_Buying_date_ck CHECK (Buying_date<SYSDATE),
CONSTRAINT Assets_Total_Price_ck CHECK (Total_Price>0)

);


CREATE TABLE Empl_Training(
Empl_id varchar2(255),
Training_Id varchar2(255),

CONSTRAINT Empl_Training_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE,
CONSTRAINT Emply_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE

);


CREATE TABLE Beneficiary_Education_Qual(
E_Id varchar2(255),
B_Id varchar2(255),

CONSTRAINT Beneficiary_Education_Qual_E_Id_fk FOREIGN KEY(E_Id) REFERENCES Eeducation_qual(E_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiary_Education_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE

);


CREATE TABLE Ref_relation(
Ref_id VARCHAR2(100),
Ref_name varchar(255) NOT NULL,
Ref_email VARCHAR2(100) NOT NULL,
Ref_Phone_No varchar2(100)	NOT NULL,
Road varchar2(255) NOT NULL,
House varchar2(255) NOT NULL,
City varchar2(255) NOT NULL,
Country varchar2(255) NOT NULL,

CONSTRAINT Ref_Realtion_Ref_Id_pk PRIMARY KEY(Ref_Id)

);


CREATE TABLE Employee_Ref(
Ref_id VARCHAR2(100),
Empl_id VARCHAR2(255),

CONSTRAINT Employee_Ref_Ref_Id_fk FOREIGN KEY(Ref_Id) REFERENCES Ref_relation(Ref_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Ref_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Employee(
Empl_Id varchar2(255),
Position_rank varchar2(255) NOT NULL,
Join_date date NOT NULL,
End_Date date NOT NULL,

CONSTRAINT Employee_Empl_Id_pk PRIMARY KEY(Empl_Id),
CONSTRAINT Employee_Join_date_ck CHECK (Join_date<=SYSDATE),
CONSTRAINT Employee_End_date_ck CHECK (End_date>=SYSDATE)

);


CREATE TABLE Employee_Project(
P_id VARCHAR2(100),
Empl_id VARCHAR2(255),

CONSTRAINT Employee_Project_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Employee_Project_Empl_Id_fk FOREIGN KEY(Empl_Id) REFERENCES Employee(Empl_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Beneficiaries(
P_id varchar2(255),
B_id varchar2(255),

CONSTRAINT Project_Beneficiaries_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Beneficiaries_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE

);


CREATE TABLE Proj_Mat_Exp_Rel(
P_Id varchar2(255),
P_Expense_Id varchar2(255),

CONSTRAINT Proj_Mat_Exp_Rel_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Proj_Mat_Exp_Rel_P_Expense_Id_fk FOREIGN KEY(P_Expense_Id) REFERENCES Proj_Mat_Expense(P_Expense_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Training_Rel(
P_Id varchar2(255),
Trg_Id varchar2(255),

CONSTRAINT Project_Training_Rel_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Training_Rel_Trg_Id_fk FOREIGN KEY(Trg_Id) REFERENCES Proj_Traing(Trg_Id) ON DELETE CASCADE

);


CREATE TABLE Project_Health(
P_Id varchar2(255),
Health_Proj_Id varchar2(255),

CONSTRAINT Project_Health_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_Health_Health_Proj_Id_fk FOREIGN KEY(Health_Proj_Id) REFERENCES Health_Proj(Health_Proj_Id) ON DELETE CASCADE

);


CREATE TABLE Project_WEmpowerment(
P_Id varchar2(255),
Seminar_Id varchar2(255),

CONSTRAINT Project_WEmpowerment_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Project_WEmpowerment_Seminar_Id_fk FOREIGN KEY(Seminar_Id) REFERENCES Women_Emp_Seminar(Seminar_Proj_Id) ON DELETE CASCADE

);


CREATE TABLE Project_WMicroCredit(
P_Id varchar2(255),
Ser_No varchar2(255),

CONSTRAINT Project_WMicroCredit_P_Id_fk FOREIGN KEY(P_Id) REFERENCES Project(P_Id) ON DELETE CASCADE,
CONSTRAINT Proj_WMicroCredit_Ser_No_fk FOREIGN KEY(Ser_No) REFERENCES W_Micro_Credit(Ser_No) ON DELETE CASCADE

);


CREATE TABLE Beneficiary_Training(
Training_Id varchar2(255),
B_Id varchar2(255),

CONSTRAINT Beneficiary_Training_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiary_Training_Training_Id_fk FOREIGN KEY(Training_Id) REFERENCES Training(Training_Id) ON DELETE CASCADE

);


CREATE TABLE Beneficiaries(
B_id VARCHAR2(100),
Limitations VARCHAR2(100),
Present_status VARCHAR2(100) NOT NULL,
Blood_Pressure VARCHAR2(100) NOT NULL,
Sugar_Level varchar2(200) NOT NULL,

CONSTRAINT Beneficiaries_B_Id_pk PRIMARY KEY(B_Id)

);


CREATE TABLE Beneficiaries_Job
(
B_id NUMBER(100),
Job_id NUMBER(100),

CONSTRAINT Beneficiaries_Job_B_Id_fk FOREIGN KEY(B_Id) REFERENCES Beneficiaries(B_Id) ON DELETE CASCADE,
CONSTRAINT Beneficiaries_Job_Job_Id_fk FOREIGN KEY(Job_Id) REFERENCES Current_job(Job_Id) ON DELETE CASCADE

);


CREATE TABLE Current_job(
Job_Id varchar2(255),
Type varchar2(255) NOT NULL,
Monthy_income number(255) NOT NULL,
No_of_Worker number(255) NOT NULL,
Start_dt date NOT NULL,
End_dt date NOT NULL,
Work_Office varchar2(255) NOT NULL,

CONSTRAINT Current_job_Job_Id_pk PRIMARY KEY(Job_Id),
CONSTRAINT Current_job_Monthly_income_ck CHECK(Monthly_income>=0),
CONSTRAINT Current_job_No_of_Worker_ck CHECK(No_of_Worker>0),
CONSTRAINT Current_job_Start_dt_ck CHECK(Start_dt<=SYSDATE),
CONSTRAINT Current_job_End_dt_ck CHECK(End_dt>=SYSDATE)

);


CREATE TABLE Proj_Mat_Expense(
P_Expense_Id VARCHAR2(100),
Amount number(255) NOT NULL,
Exp_Type VARCHAR2(100) NOT NULL,

CONSTRAINT Proj_Mat_Expense_P_Expense_Id_pk PRIMARY KEY(P_Expense_Id),
CONSTRAINT Proj_Mat_Expense_Amount_ck CHECK(Amount>0)

);


CREATE TABLE Proj_Training(
Trg_Id VARCHAR2(100),
T_Type VARCHAR2(100) NOT NULL,
Student_No NUMBER(100) NOT NULL,

CONSTRAINT Proj_Training_Trg_Id_pk PRIMARY KEY(Trg_Id),
CONSTRAINT Proj_Training_Student_No_ck CHECK(Student_No>0)

);


CREATE TABLE Health_Proj(
Health_Proj_Id varchar2(100),
Given_service VARCHAR2(100) NOT NULL,
Donated_mat VARCHAR2(100) NOT NULL,
Amount_mat VARCHAR2(100) NOT NULL,

CONSTRAINT Health_Proj_Health_Proj_Id_pk PRIMARY KEY(Health_Proj_Id),
CONSTRAINT Health_Proj_Amount_mat_ck CHECK(Amount_mat>0)

);


CREATE TABLE Women_Emp_Seminar(
Seminar_id VARCHAR2(100),
Seminar_Subj VARCHAR2(100) NOT NULL,
Seminar_Time date NOT NULL,
Chief_Guest VARCHAR2(100) NOT NULL,
Special_Guest VARCHAR2(100) NOT NULL,

CONSTRAINT Women_Emp_Seminar_Seminar_Id_pk PRIMARY KEY(Seminar_Id),
CONSTRAINT Women_Emp_Seminar_Seminar_Time_ck CHECK(Seminar_Time<=SYSDATE)

);


CREATE TABLE W_Micro_Credit(
Ser_no VARCHAR2(100),
Num_Installment VARCHAR2(100) NOT NULL,
Duration number(100) NOT NULL,	--in years
Rate number(100) NOT NULL,		--in percentage
Amount number(100) NOT NULL,	--total amount

CONSTRAINT W_Micro_Credit_Ser_No_pk PRIMARY KEY(Ser_No),
CONSTRAINT W_Micro_Credit_Num_Installment_ck CHECK(Num_Installment>0),
CONSTRAINT W_Micro_Credit_Duration_ck CHECK(Duration>0),
CONSTRAINT W_Micro_Credit_Rate_ck CHECK(Rate>0),
CONSTRAINT W_Micro_Credit_Amount_ck CHECK(Amount>0)

);





