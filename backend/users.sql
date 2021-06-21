USE eighteentech;
CREATE TABLE users (
    	 id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	 username VARCHAR(50) NOT NULL UNIQUE,
       emailaddress VARCHAR(50) NOT NULL,
	     first_name VARCHAR(50) NOT NULL,
	     last_name VARCHAR(50) NOT NULL,
    	 password VARCHAR(255) NOT NULL,
       is_admin BOOLEAN NOT NULL,
    	 created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
