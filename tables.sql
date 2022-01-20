CREATE TABLE band_members (
    id int unsigned NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE band_members_instruments (
    id int unsigned NOT NULL auto_increment,
    band_member_id int unsigned NOT NULL,
    instrument varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE patchlist (
    id int unsigned NOT NULL auto_increment,
    input_number int unsigned NOT NULL,
    band_member_id int unsigned NOT NULL,
    instrument_name varchar(255) NOT NULL,
    microphone_type varchar(50) NOT NULL,
    microphone_stand_size varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rider_type (
    id int unsigned NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE rider (
    id int unsigned NOT NULL auto_increment,
    type_id int unsigned NOT NULL,
    content TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE stuff_sections (
    id int unsigned NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE stuff (
    id int unsigned NOT NULL auto_increment,
    section_id int unsigned NOT NULL,
    band_member_id int unsigned,
    instrument_name varchar(255),
    content TEXT NOT NULL,
    PRIMARY KEY (id)
);