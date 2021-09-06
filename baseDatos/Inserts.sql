INSERT INTO rol (rol_id_rol, rol_tipo_rol, rol_created_at,rol_updated_at, rol_autEstado, rol_usuSesion)
VALUES (1, 'trabajador','02/09/2021 3:40', '02/09/2021 3:40', 1, ''),
       (2, 'empleador' ,'03/09/2021 3:41', '03/09/2021 3:41', 1,''),
       (3, 'auxiliar' ,'04/09/2021 3:42', '04/09/2021 3:42', 1,''),
       (4, 'empleado' ,'05/09/2021 3:43', '05/09/2021 3:43', 1,''),
       (5, 'asistente' ,'06/09/2021 3:44', '06/09/2021 3:44', 1,'');
       

INSERT INTO usuario_s (usuId, usuLogin, usuPassword, usuRemember_Token, usuEstado, usuario_updated_at, usu_created_at, usuUsuSesion)
VALUES (1, 'miguel', 'angel', '', 1, '02/09/2021 03:54', '02/09/2021 03:54', '' ),
       (2, 'joan', 'rua', '', 1, '02/09/2021 03:56', '02/09/2021 03:56', '' ),
       (3, 'juan', 'carlos', '', 1, '02/09/2021 03:58', '02/09/2021 3:58', '' ),
       (4, 'samir', 'susa', '', 1, '02/09/2021 00:04', '02/09/2021 00:04', '' ),
       (5, 'no', 'identificado', '', 1, '02/09/2021 04:01', '02/09/2021 04:01', '' );



INSERT INTO tipo_documento (tip_id, tip_estado, tip_created_at, tip_aud_estado,tip_nombre_documento, tip_sigla, tip_updated_at, tip_UsuSesion)
VALUES (1,'activo', '03/09/2021 04:15', 1, 'cedula', 'cc', '03/09/2021 04:15', ''),
       (2,'activo', '03/09/2021 04:17', 1, 'tarjeta identidad ', 'ti', '03/09/2021 04:17', ''),
       (3,'activo', '03/09/2021 04:19', 1, 'cedula extranjeria', 'ce', '03/09/2021 04:19', ''),
       (4,'activo', '03/09/2021 04:21', 1, 'pasaporte', 'pa', '03/09/2021 04:21', '');

INSERT INTO ubicacion (ubi_id, ubi_direccion, ubi_created_at, ubi_autEstado, ubi_updated_at, ubi_usuSesion)
VALUES (1, 'cll 184#22-16', '02/09/2021 04:21', 1, '02/09/2021 04:21', ''),
 (2, 'cll 189#2-24', '02/09/2021 04:21', 1, '02/09/2021 04:21', ''),
 (3, 'cll 187#3-26', '02/09/2021 04:22', 1, '02/09/2021 04:22', ''),
 (4, 'cll 188#4-28', '02/09/2021 04:23', 1, '02/09/2021 04:23', ''),
 (5, 'cll 180#5-22', '02/09/2021 04:24', 1, '02/09/2021 04:24', ''),
 (6, 'cll 170#6-20', '02/09/2021 04:25', 1, '02/09/2021 04:25', '');

INSERT INTO constructora (con_id, con_id_system_user, con_id_tipo_documento, con_estado, con_created_at, con_autEstado, con_nombre_empresa, con_numero_documento, con_updated_at, con_usuSesion, usuario_s_usuId )
VALUES 
(1, 1, 1, 'activo', '02/09/2021 04:30', 1, 'building corporation', '1000572910', '02/09/2021 04:33', '', 1 ),
(2, 2, 2, 'activo', '02/09/2021 04:34', 2, 'building', '1000572911', '02/09/2021 04:34', '', 2 ),
(3, 3, 3, 'activo', '02/09/2021 04:35', 3, 'corporation', '1000572912', '02/09/2021 04:35', '', 3 ),
(4, 4, 4, 'activo', '02/09/2021 04:36', 4, 'emprendimiento', '1000572913', '02/09/2021 04:33', '', 4 ),
(5, 5, 5, 'activo', '02/09/2021 04:37', 5, 'valor', '1000572914', '02/09/2021 04:37', '', 5 );


INSERT INTO sede (sed_id, sed_fecha_modificacion, sed_estado, sed_created_at, sed_constructora_id, sed_autEstado, sed_nombre_sede, sed_ubicacion_id, sed_updated_at, sed_usuSesion)
VALUES (1, '02/09/2021 04:06', 1, '02/09/2021 04:06', 1, 1, 'usaquen', 1, '02/09/2021 04:08', ''),
       (2, '02/09/2021 04:10', 1, '02/09/2021 04:10', 2, 1, 'bosa', 2, '02/09/2021 04:10', ''), 
       (3, '02/09/2021 04:15', 1, '02/09/2021 04:15', 3, 1, 'kenedy', 3, '02/09/2021 04:15', ''),
       (4, '02/09/2021 04:20', 1, '02/09/2021 04:20', 4, 1, 'usme', 4, '02/09/2021 04:20', ''),
       (5, '02/09/2021 04:25', 1, '02/09/2021 04:25', 5, 1, 'suba', 5, '02/09/2021 04:25', '');

INSERT INTO material_construccion (mat_id, mat_nombre_material, mat_tipo_material, mat_precio, mat_created_at, mat_updated_at, mat_usuSesion)
    VALUES (1001,'Ladrillo','general', 1000, '02/09/2021 04:34', '03/09/2021 15:34',''),
    (2001,'cemento','pegante', 2500, '02/09/2021 12:34', '03/09/2021 21:34',''),
    (1003,'Eternit','cubierta', 32000, '11/09/2021 04:34', '03/09/2021 15:34',''),
    (1025,'Mosaicos','Ceramico', 11100, '04/09/2021 04:34', '03/09/2021 15:34',''),
    (5061,'Vinilo','Pintura', 56000, '02/06/2021 04:34', '03/09/2021 15:34','');

INSERT INTO recibido (rec_id, rec_fecha_recibido, rec_fecha_modificacion, rec_created_at, rec_cantidad_recibido, rec_autEstado,rec_material_construccion_id,rec_num_factura, rec_updated_at, rec_usuSesion )
VALUES (1, '03/09/2021 04:47', '03/09/2021 04:50', '03/09/2021 04:51', 1, 1, 1, 1, '03/09/2021 04:55', 1),
(2, '03/09/2021 04:55', '03/09/2021 04:55', '03/09/2021 04:55', 1, 1, 2, 2, '03/09/2021 04:55', 1),
(3, '03/09/2021 04:57', '03/09/2021 04:57', '03/09/2021 04:57', 1, 1, 3, 3, '03/09/2021 04:57', 1),
(4, '03/09/2021 05:00', '03/09/2021 05:00', '03/09/2021 05:00', 1, 1, 4, 4, '03/09/2021 05:00', 1);


INSERT INTO proyecto (pro_id, material_construccion_mat_id, pro_tipo_proyecto, pro_nombre_proyecto, pro_numero_proyecto, pro_descripcion_proyecto, pro_fecha_inicio, pro_fecha_fin, pro_estado, pro_sede_id, pro_recibido_id, pro_trabajador_id, pro_created_at, pro_updated_at, pro_usuSesion, pro_autEstado)
    VALUES (203, 1001, 'Residencial', 'Axxis', '6758', "Descripcion del mismo", '02/09/2021 12:34', '03/09/2021 21:34', 'activo', 1, 2, 3465, '28/03/2021 04:34', '13/012/2021 15:34', '', 1),
    (204, 2001, 'Residencial', 'El golf', '5458', "Descripcion del mismo", '02/09/2021 12:34', '03/09/2021 21:34', 'activo', 2, 2, 3466, '28/03/2020 04:34', '13/012/2021 15:34', '', 1),
    (205, 1003, 'Residencial', 'Grattacielo', '6759', "Descripcion del mismo", '02/12/2021 12:34', '03/09/2021 21:34', 'activo', 3, 2, 3467, '28/05/2021 04:34', '13/012/2021 15:34', '', 1),
    (206, 1025, 'Residencial', 'lAngolo', '8758', "Descripcion del mismo", '02/07/2021 12:34', '03/09/2019 21:34', 'inactivo', 4, 2, 3468, '28/03/2021 04:34', '13/012/2021 15:34', '', 1),
    (207, 5061, 'Comercial', 'Buenavista', '9658', "Descripcion del mismo", '02/04/2020 12:34', '03/09/2021 21:34', 'activo', 5, 2, 3469, '28/03/2019 04:34', '13/012/2021 15:34', '', 1);


INSERT INTO trabajador (tra_id, tra_primer_nombre, tra_segundo_nombre, tra_primer_apellido, tra_segundo_apellido,tra_estado, tra_sede_id, tra_tipo_documento_id,tra_created_at, tra_updated_at, tra_usuSesion, tra_autEstado)
VALUES (1, 'Juan', 'Carlos', 'Olmos', 'Villalobos', 'activo', 1, 1, '02/09/2021 05:33', '00/00/2021 04:33','',0),
       (2, 'Juan', 'Camilo', 'Olmos', 'Villalobos', 'activo', 1, 1, '02/07/2021 04:33', '00/00/2021 04:33','',0),
       (3, 'Jheferson', 'Carlos', 'Jurado', 'Torres', 'activo', 1, 1, '02/05/2021 07:33', '00/00/2021 04:33','',1),
       (4, 'Ronalt', 'Howell', 'Hughes', 'Kingdom', 'activo', 1, 1, '02/03/2021 03:33', '00/00/2021 04:33','',0),
       (5, 'Margarita', 'Ignacia', 'saieh', 'Jasir', 'activo', 1, 1, '02/02/2021 04:33', '00/00/2021 04:33','',0);

INSERT INTO utilizado (uti_id, uti_cantidad_utilizado, uti_fecha_uso, uti_fecha_modificacion, uti_autEstado, uti_created_at, uti_updated_at, uti_usuSesion) VALUES
(1, 15, '24/08/2002', '03/09/2021 02:27', 1, '12/09/2021 04:27', '25/09/2021 04:27', ''),
(2, 7, '12/08/2008', '04/09/2021 12:27', 1, '13/09/2021 04:27', '26/09/2021 04:27', ''),
(3, 120, '07/12/2000', '05/09/2021 02:27', 1, '14/09/2021 04:27', '27/09/2021 04:27', ''),
(4, 2, '24/12/2001', '05/09/2021 05:27', 1, '15/09/2021 04:27', '28/09/2021 04:27', ''),
(5, 36, '24/08/2001', '06¨/09/2021 06:27', 1, '16/09/2021 04:27', '29/09/2021 04:27', '');

INSERT INTO Stock (sto_id, sto_fecha_modificacion, sto_estado, sto_created_at, sto_cantidad_almacenado,sto_autEstado, sto_recibido_id, sto_updated_at, sto_usuSesion, sto_utilizado_id)
VALUES 
(1, '03/09/2021 04:27', 1, '03/09/2021 04:27', 1, 1, 1, '03/09/2021 04:27','', 1), 
(2, '03/09/2021 04:34', 1, '03/09/2021 04:34', 1, 1, 1, '03/09/2021 04:34','', 1),  
(3, '03/09/2021 04:37', 1, '03/09/2021 04:37', 1, 1, 1, '03/09/2021 04:37','', 1),
(4, '03/09/2021 04:38', 1, '03/09/2021 04:38', 1, 1, 1, '03/09/2021 04:38','', 1);


INSERT INTO registro (reg_id, reg_fecha_modificacion, reg_created_at, reg_comentarios, reg_autEstado, reg_numero_registro, reg_stock_id, reg_updated_at, reg_usuSesion)
VALUES  (1, 03/09/2021, 04/09/2021,'no hubo problemas', 1, 16, 1, 04/09/2021, ''), 
        (2, 04/09/2021, 05/09/2021,'retraso en la obra', 1, 14, 1, 05/09/2021, ''),  
        (3, 05/09/2021, 06/09/2021,'accidente', 1, 10, 1, 06/09/2021, ''),  
        (4, 06/09/2021, 07/09/2021,'todo en buen estado', 1, 06, 1, 07/09/2021, '');   











