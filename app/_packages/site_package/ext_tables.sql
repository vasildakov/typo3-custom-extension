
CREATE TABLE tx_sitepackage_domain_model_product (
    uid int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid int(11) DEFAULT '0' NOT NULL,
    title       varchar(255)    DEFAULT '' NOT NULL,
    description text            NOT NULL,
    price       decimal(8, 2)   NOT NULL,
    image       varchar(255)    DEFAULT '' NOT NULL,
    categories int(11) UNSIGNED DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
    KEY parent (pid)
);

CREATE TABLE tx_sitepackage_domain_model_category (
    uid int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    pid int(11) DEFAULT '0' NOT NULL,
    title       varchar(255)    DEFAULT '' NOT NULL,
    description text            NOT NULL,
    products int(11) unsigned DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
    KEY parent (pid)
);

CREATE TABLE tx_sitepackage_domain_model_product_category (
    uid_local int(11) UNSIGNED DEFAULT '0' NOT NULL,
    uid_foreign int(11) UNSIGNED DEFAULT '0' NOT NULL,
    sorting int(11) UNSIGNED DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
