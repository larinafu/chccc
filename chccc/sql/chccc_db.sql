create database chccc
	CHARACTER SET utf8;
use chccc;

create table message(
	message_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	message_date date NOT NULL,
	speaker varchar(120) NOT NULL,
	message_title varchar(500) NOT NULL,
	speaker_en varchar(120),
	message_title_en varchar(500),
	message_audio_file_name varchar(200),
	message_pdf_file_name varchar(200),
	message_video_file_name varchar(200),
	bible_verses varchar(1000),
	bible_verses_en varchar(1000),
	published bool DEFAULT TRUE,
	PRIMARY KEY(message_id)
);

create index idx_message_date on message(message_date);
create index idx_message_speaker on message(speaker);


