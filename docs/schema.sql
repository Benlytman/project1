CREATE DATABASE tracker_system;
USE tracker_system;

CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    manager_name VARCHAR(100) NOT NULL,
    manager_phone VARCHAR(20) NOT NULL
);

CREATE TABLE branch ( 
    branch_id INT AUTO_INCREMENT PRIMARY KEY,
    branch_name VARCHAR(100) NOT NULL,
    location_address VARCHAR(200) NOT NULL,
    county VARCHAR(100) NOT NULL
);

CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    staff_full_name VARCHAR(100) NOT NULL,
    password varchar(20) not null,
    phone_no VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    department_id INT,
    branch_id INT,
    CONSTRAINT fk_department_staff FOREIGN KEY (department_id)
     REFERENCES department(department_id)
     on delete SET NULL
     on update cascade,
       
    CONSTRAINT fk_branch_staff FOREIGN KEY (branch_id) 
    REFERENCES branch(branch_id)
    on delete set null
    on update cascade 
    
);

CREATE TABLE asset (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    serial_number VARCHAR(100) NOT NULL,
    asset_name VARCHAR(100) NOT NULL,
    asset_type VARCHAR(50) NOT NULL,
    status ENUM('In use',
    'Faulty',
    'In Repair',
    'decommissioned')
     DEFAULT 'In use',
    staff_id INT,
    branch_id INT,

    CONSTRAINT fk_staff_asset FOREIGN KEY (staff_id)
    REFERENCES staff(staff_id)
    on delete set null
    on update cascade ,
    
        
   CONSTRAINT fk_branch_asset FOREIGN KEY (branch_id)
    REFERENCES branch(branch_id)
    on delete set null
    on update cascade 
    
);

CREATE TABLE asset_maintenance (
    maintenance_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    date_serviced DATE NOT NULL,
    description TEXT NOT NULL,
    maintenance_report TEXT,

    CONSTRAINT fk_asset_maintenance FOREIGN KEY (asset_id)
     REFERENCES asset(asset_id)
     on delete cascade 
     on update cascade
       
);