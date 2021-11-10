CREATE TABLE tx_bokunorecipe_domain_model_recipe (
	title varchar(255) NOT NULL DEFAULT '',
	preparation text,
	images int(11) unsigned NOT NULL DEFAULT '0',
	ingredients int(11) unsigned NOT NULL DEFAULT '0'
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
	ingredient int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_bokunorecipe_domain_model_recipe (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_bokunorecipe_domain_model_ingredients (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);
