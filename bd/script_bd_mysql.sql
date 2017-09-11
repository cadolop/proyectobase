DROP TABLE usuario;
DROP TABLE permiso;
DROP TABLE menu;
DROP TABLE perfil;

CREATE TABLE perfil (
  idperfil INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(300) NULL,
  anulado INT NULL,
  PRIMARY KEY (idperfil));
  
CREATE TABLE menu (
  idmenu INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(300) NULL,
  icono VARCHAR(300) NULL,
  anulado INT NULL,
  PRIMARY KEY (idmenu));

CREATE TABLE permiso (
  idpermiso INT NOT NULL AUTO_INCREMENT,
  menu INT NULL,
  perfil INT NULL,
  permiso VARCHAR(45) NULL,
  anulado INT NULL,
  PRIMARY KEY (idpermiso),
  INDEX fk_permiso_menu_idx (menu ASC),
  INDEX fk_permiso_perfil_idx (perfil ASC),
  UNIQUE INDEX uk_permiso_menuperfil (menu ASC, perfil ASC),
  CONSTRAINT fk_permiso_menu
    FOREIGN KEY (menu)
    REFERENCES electivas.menu (idmenu)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_permiso_perfil
    FOREIGN KEY (perfil)
    REFERENCES electivas.perfil (idperfil)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE usuario (
  idusuario INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(300) NULL,
  contrasena VARCHAR(300) NULL,
  ultima_sesion DATE NULL,
  perfil INT NULL,
  anulado INT NULL,
  PRIMARY KEY (idusuario),
  INDEX pk_usuario_perfil_idx (perfil ASC),
  UNIQUE INDEX uk_usuario_login (login ASC),
  CONSTRAINT pk_usuario_perfil
    FOREIGN KEY (perfil)
    REFERENCES electivas.perfil (idperfil)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);