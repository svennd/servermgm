CREATE TABLE `racks` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `name` TEXT NULL DEFAULT NULL,
  `size` INTEGER(11) NULL DEFAULT NULL,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `notes` TEXT NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
	
CREATE TABLE `devices` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `rack` INTEGER(11) NULL DEFAULT NULL,
  `size` INTEGER(11) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `brand` VARCHAR(255) NULL DEFAULT NULL,
  `warranty` VARCHAR(255) NULL DEFAULT NULL,
  `serial` VARCHAR(255) NULL DEFAULT NULL,
  `notes` VARCHAR(255) NULL DEFAULT NULL,
  `type` VARCHAR(255) NULL DEFAULT NULL,
  `cpu_count` INTEGER(11) NULL DEFAULT NULL,
  `cpu_type` VARCHAR(255) NULL DEFAULT NULL,
  `memory_banks` INTEGER(11) NULL DEFAULT NULL,
  `memory_filled` INTEGER(11) NULL DEFAULT NULL,
  `memory_size` INTEGER(11) NULL DEFAULT NULL,
  `ports` INTEGER(11) NULL DEFAULT NULL,
  `capacity` INTEGER(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
	
CREATE TABLE `hdd` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `server` INTEGER(11) NULL DEFAULT NULL,
  `serial` VARCHAR(255) NULL DEFAULT NULL,
  `brand` VARCHAR(255) NULL DEFAULT NULL,
  `capacity` VARCHAR(255) NULL DEFAULT NULL,
  `vendor` VARCHAR(255) NULL DEFAULT NULL,
  `bought` VARCHAR(255) NULL DEFAULT NULL,
  `warranty` VARCHAR(255) NULL DEFAULT NULL,
  `status` VARCHAR(255) NULL DEFAULT NULL,
  `notes` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
	
CREATE TABLE `network` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `server` INTEGER(11) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `mac` VARCHAR(255) NULL DEFAULT NULL,
  `ip` VARCHAR(255) NULL DEFAULT NULL,
  `notes` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `ipmi` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `device` INTEGER(11) NULL DEFAULT NULL,
  `mac` VARCHAR(255) NULL DEFAULT NULL,
  `ip` VARCHAR(255) NULL DEFAULT NULL,
  `notes` TEXT NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `position` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `rack` INTEGER(11) NULL DEFAULT NULL,
  `position` INTEGER(11) NULL DEFAULT NULL,
  `device` INTEGER(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `events` (
  `id` INTEGER(11) NULL AUTO_INCREMENT DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `timespan` varchar(255) NULL DEFAULT NULL,
  `device` int(11) NULL DEFAULT NULL,
  `auto` int(1) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);