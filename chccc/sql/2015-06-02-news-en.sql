create table ch_news_en(
news_id MEDIUMINT NOT NULL AUTO_INCREMENT,
news_date date NOT NULL,
news_summary varchar(500) NOT NULL,
news varchar(65535),
news_summary_en varchar(500),
news_en varchar(65535),
sort_order SMALLINT DEFAULT 2,
published bool DEFAULT TRUE,
PRIMARY KEY(news_id)
);