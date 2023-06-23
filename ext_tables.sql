CREATE TABLE tx_bokunorecipe_domain_model_recipe (
	title varchar(255) NOT NULL DEFAULT '',
	portions varchar(255) NOT NULL DEFAULT '',
	max_time varchar(255) NOT NULL DEFAULT '',
	prep_time varchar(255) NOT NULL DEFAULT '',
	teaser text,
	preparation text,
	publish_date date DEFAULT NULL,
	images int(11) unsigned NOT NULL DEFAULT '0',
	slug varchar(255) NOT NULL DEFAULT '',
	ingredients int(11) unsigned NOT NULL DEFAULT '0',
	related text NOT NULL
);

CREATE TABLE tx_bokunorecipe_domain_model_ingredients (
	title varchar(255) NOT NULL DEFAULT '',
	unit varchar(255) NOT NULL DEFAULT '',
	gluten smallint(1) unsigned NOT NULL DEFAULT '0',
	lactose smallint(1) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_bokunorecipe_domain_model_ingredientstorecipe (
	recipe int(11) unsigned DEFAULT '0' NOT NULL,
	quantity varchar(255) NOT NULL DEFAULT '',
	alternative_measurement int(11) DEFAULT '0' NOT NULL,
	custom_group varchar(255) NOT NULL DEFAULT '',
	ingredient int(11) unsigned DEFAULT '0'
);

CREATE TABLE sys_category (
	tx_extbase_type varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_bokunorecipe_domain_model_recipe (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_bokunorecipe_domain_model_ingredients (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

CREATE TABLE tx_bokunorecipe_domain_model_category (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_bokunorecipe_domain_model_ingredients (
	title varchar(255) NOT NULL DEFAULT '' UNIQUE
);