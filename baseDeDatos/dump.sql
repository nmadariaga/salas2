--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: asignaturas; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE asignaturas (
    id bigint NOT NULL,
    departamento_id integer NOT NULL,
    codigo character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.asignaturas OWNER TO neftali;

--
-- Name: asignaturas_cursadas; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE asignaturas_cursadas (
    id bigint NOT NULL,
    curso_id bigint NOT NULL,
    estudiante_id bigint NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.asignaturas_cursadas OWNER TO neftali;

--
-- Name: asignaturas_cursadas_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE asignaturas_cursadas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asignaturas_cursadas_id_seq OWNER TO neftali;

--
-- Name: asignaturas_cursadas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE asignaturas_cursadas_id_seq OWNED BY asignaturas_cursadas.id;


--
-- Name: asignaturas_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE asignaturas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asignaturas_id_seq OWNER TO neftali;

--
-- Name: asignaturas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE asignaturas_id_seq OWNED BY asignaturas.id;


--
-- Name: campus; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE campus (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    direccion character varying(255) NOT NULL,
    latitud double precision NOT NULL,
    longitud double precision NOT NULL,
    descripcion text,
    rut_encargado integer NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.campus OWNER TO neftali;

--
-- Name: campus_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE campus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.campus_id_seq OWNER TO neftali;

--
-- Name: campus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE campus_id_seq OWNED BY campus.id;


--
-- Name: carreras; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE carreras (
    id integer NOT NULL,
    escuela_id integer NOT NULL,
    codigo integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.carreras OWNER TO neftali;

--
-- Name: carreras_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE carreras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carreras_id_seq OWNER TO neftali;

--
-- Name: carreras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE carreras_id_seq OWNED BY carreras.id;


--
-- Name: curso_estudiante; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE curso_estudiante (
    id bigint NOT NULL,
    curso_id bigint NOT NULL,
    estudiante_id bigint NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.curso_estudiante OWNER TO neftali;

--
-- Name: curso_estudiante_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE curso_estudiante_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.curso_estudiante_id_seq OWNER TO neftali;

--
-- Name: curso_estudiante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE curso_estudiante_id_seq OWNED BY curso_estudiante.id;


--
-- Name: cursos; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE cursos (
    id bigint NOT NULL,
    asignatura_id bigint NOT NULL,
    docente_id integer NOT NULL,
    semestre integer NOT NULL,
    anio integer NOT NULL,
    seccion integer NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.cursos OWNER TO neftali;

--
-- Name: cursos_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE cursos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_id_seq OWNER TO neftali;

--
-- Name: cursos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE cursos_id_seq OWNED BY cursos.id;


--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE departamentos (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    facultad_id integer NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.departamentos OWNER TO neftali;

--
-- Name: departamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE departamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamentos_id_seq OWNER TO neftali;

--
-- Name: departamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE departamentos_id_seq OWNED BY departamentos.id;


--
-- Name: docentes; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE docentes (
    id integer NOT NULL,
    departamento_id integer NOT NULL,
    rut integer NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.docentes OWNER TO neftali;

--
-- Name: docentes_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE docentes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.docentes_id_seq OWNER TO neftali;

--
-- Name: docentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE docentes_id_seq OWNED BY docentes.id;


--
-- Name: escuelas; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE escuelas (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    departamento_id integer NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.escuelas OWNER TO neftali;

--
-- Name: escuelas_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE escuelas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.escuelas_id_seq OWNER TO neftali;

--
-- Name: escuelas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE escuelas_id_seq OWNED BY escuelas.id;


--
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE estudiantes (
    id integer NOT NULL,
    carrera_id integer NOT NULL,
    rut integer NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.estudiantes OWNER TO neftali;

--
-- Name: estudiantes_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE estudiantes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estudiantes_id_seq OWNER TO neftali;

--
-- Name: estudiantes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE estudiantes_id_seq OWNED BY estudiantes.id;


--
-- Name: facultades; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE facultades (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    campus_id integer NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.facultades OWNER TO neftali;

--
-- Name: facultades_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE facultades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facultades_id_seq OWNER TO neftali;

--
-- Name: facultades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE facultades_id_seq OWNED BY facultades.id;


--
-- Name: funcionarios; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE funcionarios (
    id integer NOT NULL,
    departamento_id integer NOT NULL,
    rut integer NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.funcionarios OWNER TO neftali;

--
-- Name: funcionarios_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE funcionarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.funcionarios_id_seq OWNER TO neftali;

--
-- Name: funcionarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE funcionarios_id_seq OWNED BY funcionarios.id;


--
-- Name: horarios; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE horarios (
    id bigint NOT NULL,
    fecha date DEFAULT now() NOT NULL,
    sala_id bigint NOT NULL,
    periodo_id integer NOT NULL,
    curso_id bigint NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.horarios OWNER TO neftali;

--
-- Name: horarios_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE horarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.horarios_id_seq OWNER TO neftali;

--
-- Name: horarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE horarios_id_seq OWNED BY horarios.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO neftali;

--
-- Name: periodos; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE periodos (
    id bigint NOT NULL,
    bloque character varying(255) NOT NULL,
    inicio time without time zone NOT NULL,
    fin time without time zone NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.periodos OWNER TO neftali;

--
-- Name: periodos_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE periodos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.periodos_id_seq OWNER TO neftali;

--
-- Name: periodos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE periodos_id_seq OWNED BY periodos.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.roles OWNER TO neftali;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO neftali;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- Name: roles_usuarios; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE roles_usuarios (
    id integer NOT NULL,
    rut integer NOT NULL,
    rol_id integer NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.roles_usuarios OWNER TO neftali;

--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE roles_usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_usuarios_id_seq OWNER TO neftali;

--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE roles_usuarios_id_seq OWNED BY roles_usuarios.id;


--
-- Name: salas; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE salas (
    id bigint NOT NULL,
    campus_id integer NOT NULL,
    tipo_sala_id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.salas OWNER TO neftali;

--
-- Name: salas_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE salas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.salas_id_seq OWNER TO neftali;

--
-- Name: salas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE salas_id_seq OWNED BY salas.id;


--
-- Name: tipos_salas; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE tipos_salas (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.tipos_salas OWNER TO neftali;

--
-- Name: tipos_salas_id_seq; Type: SEQUENCE; Schema: public; Owner: neftali
--

CREATE SEQUENCE tipos_salas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipos_salas_id_seq OWNER TO neftali;

--
-- Name: tipos_salas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neftali
--

ALTER SEQUENCE tipos_salas_id_seq OWNED BY tipos_salas.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: neftali; Tablespace: 
--

CREATE TABLE usuarios (
    rut integer NOT NULL,
    email character varying(255),
    nombres character varying(255),
    apellidos character varying(255),
    remember_token character varying(100),
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.usuarios OWNER TO neftali;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY asignaturas ALTER COLUMN id SET DEFAULT nextval('asignaturas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY asignaturas_cursadas ALTER COLUMN id SET DEFAULT nextval('asignaturas_cursadas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY campus ALTER COLUMN id SET DEFAULT nextval('campus_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY carreras ALTER COLUMN id SET DEFAULT nextval('carreras_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY curso_estudiante ALTER COLUMN id SET DEFAULT nextval('curso_estudiante_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY cursos ALTER COLUMN id SET DEFAULT nextval('cursos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY departamentos ALTER COLUMN id SET DEFAULT nextval('departamentos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY docentes ALTER COLUMN id SET DEFAULT nextval('docentes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY escuelas ALTER COLUMN id SET DEFAULT nextval('escuelas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY estudiantes ALTER COLUMN id SET DEFAULT nextval('estudiantes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY facultades ALTER COLUMN id SET DEFAULT nextval('facultades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY funcionarios ALTER COLUMN id SET DEFAULT nextval('funcionarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY horarios ALTER COLUMN id SET DEFAULT nextval('horarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY periodos ALTER COLUMN id SET DEFAULT nextval('periodos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY roles_usuarios ALTER COLUMN id SET DEFAULT nextval('roles_usuarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY salas ALTER COLUMN id SET DEFAULT nextval('salas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY tipos_salas ALTER COLUMN id SET DEFAULT nextval('tipos_salas_id_seq'::regclass);


--
-- Data for Name: asignaturas; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY asignaturas (id, departamento_id, codigo, nombre, descripcion, created_at, updated_at) FROM stdin;
23	26	INF-123	Programacion		2015-08-01 02:00:55	2015-08-01 02:00:55
24	19	MAT-569	Calculo Iii		2015-08-01 02:01:19	2015-08-01 02:01:19
25	19	MAT-957	Ecuaciones Diferenciales		2015-08-01 02:01:39	2015-08-01 02:01:39
26	25	HUM-789	Etica		2015-08-01 02:02:04	2015-08-01 02:02:04
27	14	EST-123	Estadistica Y Probabilidades		2015-08-01 02:02:55	2015-08-01 02:02:55
\.


--
-- Data for Name: asignaturas_cursadas; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY asignaturas_cursadas (id, curso_id, estudiante_id, created_at, updated_at) FROM stdin;
\.


--
-- Name: asignaturas_cursadas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('asignaturas_cursadas_id_seq', 1, false);


--
-- Name: asignaturas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('asignaturas_id_seq', 27, true);


--
-- Data for Name: campus; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY campus (id, nombre, direccion, latitud, longitud, descripcion, rut_encargado, created_at, updated_at) FROM stdin;
65	Campus Area Central	Dieciocho 390, Santiago Centro, Metro Toesca.	-33.4512321999999998	-70.6572187999999954		2222222	2015-08-01 01:38:07	2015-08-01 01:38:07
64	Campus Macul	Av. José Pedro Alessandri 1242, Ñuñoa, Santiago.	-33.4663316999999978	-70.598171899999997		1111111	2015-08-01 01:35:05	2015-08-01 01:39:15
66	Campus Providencia	Dr. Hernán Alessandri 722, Providencia	-33.4349673999999979	-70.6243252000000012		3333333	2015-08-01 01:39:06	2015-08-02 18:03:49
\.


--
-- Name: campus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('campus_id_seq', 66, true);


--
-- Data for Name: carreras; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY carreras (id, escuela_id, codigo, nombre, descripcion, created_at, updated_at) FROM stdin;
9	10	21002	Bibliotecología Y Documentación		2015-08-01 01:53:23	2015-08-01 01:53:23
10	9	21012	Contador Público Y Auditor		2015-08-01 01:53:54	2015-08-01 01:53:54
11	11	21048	Ingeniería Comercial		2015-08-01 01:56:10	2015-08-01 01:56:17
12	11	21015	Ingeniería En Administración Agroindustrial		2015-08-01 01:56:48	2015-08-01 01:56:48
13	8	21081	Ingeniería En Comercio Internacional		2015-08-01 01:57:11	2015-08-01 01:57:11
14	7	21082	Ingeniería En Gestión Turística		2015-08-01 01:57:58	2015-08-01 01:57:58
\.


--
-- Name: carreras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('carreras_id_seq', 14, true);


--
-- Data for Name: curso_estudiante; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY curso_estudiante (id, curso_id, estudiante_id, created_at, updated_at) FROM stdin;
47	15	11	2015-08-01 02:10:07	2015-08-01 02:10:07
49	17	11	2015-08-01 03:23:21	2015-08-01 03:23:21
51	18	11	2015-08-01 03:23:32	2015-08-01 03:23:32
52	16	17	2015-08-03 17:49:47	2015-08-03 17:49:47
53	21	11	2015-08-04 12:57:20	2015-08-04 12:57:20
\.


--
-- Name: curso_estudiante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('curso_estudiante_id_seq', 53, true);


--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY cursos (id, asignatura_id, docente_id, semestre, anio, seccion, created_at, updated_at) FROM stdin;
16	23	12	1	2015	2	2015-08-01 02:03:49	2015-08-01 02:03:49
17	24	11	1	2015	1	2015-08-01 02:04:06	2015-08-01 02:04:06
18	25	11	1	2015	2	2015-08-01 02:04:23	2015-08-01 02:04:27
19	26	14	1	2015	1	2015-08-01 02:05:00	2015-08-01 02:05:05
20	27	13	1	2015	2	2015-08-01 02:05:23	2015-08-01 02:05:28
21	26	18	1	2015	2	2015-08-03 22:51:15	2015-08-03 22:51:15
22	24	18	1	2015	3	2015-08-03 22:52:04	2015-08-03 22:52:04
15	23	18	1	2015	1	2015-08-01 02:03:25	2015-08-03 22:57:09
\.


--
-- Name: cursos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('cursos_id_seq', 22, true);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY departamentos (id, nombre, facultad_id, descripcion, created_at, updated_at) FROM stdin;
10	Departamento De Gestión Organizacional	44		2015-08-01 01:41:13	2015-08-01 01:41:13
11	Departamento De Economía, Recursos Naturales Y Comercio Internacional	44		2015-08-01 01:41:23	2015-08-01 01:41:23
12	Departamento De Contabilidad Y Gestión Financiera	44		2015-08-01 01:41:38	2015-08-01 01:41:38
13	Departamento De Gestión De La Información	44		2015-08-01 01:41:49	2015-08-01 01:41:49
14	Departamento De Estadística Y Econometría	44		2015-08-01 01:41:58	2015-08-01 01:41:58
15	Departamento De Prevención De Riesgos Y Medio Ambiente	45		2015-08-01 01:44:03	2015-08-01 01:44:03
16	Departamento De Ciencias De La Construcción	45		2015-08-01 01:44:15	2015-08-01 01:44:15
17	Departamento De Planificación Y Ordenamiento Territorial	45		2015-08-01 01:44:44	2015-08-01 01:44:44
18	Departamento De Química	46		2015-08-01 01:46:07	2015-08-01 01:46:07
19	Departamento De Matemáticas	46		2015-08-01 01:46:22	2015-08-01 01:46:22
20	Departamento De Física	46		2015-08-01 01:46:33	2015-08-01 01:46:33
21	Departamento De Biotecnología	46		2015-08-01 01:46:49	2015-08-01 01:46:49
22	Departamento De Diseño	47		2015-08-01 01:47:46	2015-08-01 01:47:46
23	Departamento De Cartografía	47		2015-08-01 01:48:01	2015-08-01 01:48:01
24	Departamento De Trabajo Social	47		2015-08-01 01:48:10	2015-08-01 01:48:10
25	Departamento De Humanidades	47		2015-08-01 01:48:18	2015-08-01 01:48:18
26	Departamento De Informática Y Computación	48		2015-08-01 01:49:42	2015-08-01 01:49:42
27	Departamento De Industria	48		2015-08-01 01:49:50	2015-08-01 01:49:50
28	Departamento De Electricidad	48		2015-08-01 01:49:59	2015-08-01 01:49:59
29	Departamento De Mecánica	48		2015-08-01 01:50:07	2015-08-01 01:50:07
\.


--
-- Name: departamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('departamentos_id_seq', 30, true);


--
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY docentes (id, departamento_id, rut, nombres, apellidos, created_at, updated_at) FROM stdin;
12	26	98765432	Profesor	De Programacion	2015-08-01 01:59:13	2015-08-01 01:59:13
13	10	12547896	Profesor	De Estadistica	2015-08-01 01:59:28	2015-08-01 01:59:28
14	10	9875412	PROFEsor 	De Etica	2015-08-01 01:59:46	2015-08-01 01:59:46
16	27	9874589	Lolo	Manolo	2015-08-02 21:25:26	2015-08-02 21:25:26
17	27	2012487	Cauro Chico	Tocopilla	2015-08-02 21:25:26	2015-08-02 21:25:26
18	11	17746323	El Tali	Profesor	2015-08-03 22:47:20	2015-08-04 15:47:17
15	10	1234567	Juan	Perez	2015-08-02 21:25:26	2015-08-04 15:47:33
11	20	12345678	Profesor	De Matematicas	2015-08-01 01:58:48	2015-08-04 15:47:42
\.


--
-- Name: docentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('docentes_id_seq', 18, true);


--
-- Data for Name: escuelas; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY escuelas (id, nombre, departamento_id, descripcion, created_at, updated_at) FROM stdin;
7	Escuela De Administración	10		2015-08-01 01:42:27	2015-08-01 01:42:27
8	Escuela De Comercio Internacional	11		2015-08-01 01:42:40	2015-08-01 01:42:40
9	Escuela De Contadores Auditores	12		2015-08-01 01:42:52	2015-08-01 01:42:52
10	Escuela De Bibliotecología	13		2015-08-01 01:43:05	2015-08-01 01:43:05
11	Escuela De Ingeniería Comercial	14		2015-08-01 01:43:14	2015-08-01 01:43:14
12	Escuela De Prevención De Riesgos Y Medio Ambiente	15		2015-08-01 01:45:00	2015-08-01 01:45:00
13	Escuela De Construcción Civil	16		2015-08-01 01:45:30	2015-08-01 01:45:30
14	Escuela De Arquitectura	16		2015-08-01 01:45:44	2015-08-01 01:45:44
15	Escuela De Química	18		2015-08-01 01:47:06	2015-08-01 01:47:06
16	Escuela De Ingeniería En Industria Alimentaria	21		2015-08-01 01:47:31	2015-08-01 01:47:31
17	Escuela De Diseño	22		2015-08-01 01:48:32	2015-08-01 01:48:32
18	Escuela De Cartografía	23		2015-08-01 01:48:44	2015-08-01 01:48:44
19	Escuela De Trabajo Social	24		2015-08-01 01:48:55	2015-08-01 01:48:55
20	Escuela De Informática	26		2015-08-01 01:51:11	2015-08-01 01:51:11
21	Escuela De Industria	27		2015-08-01 01:51:29	2015-08-01 01:51:29
22	Escuela De Electrónica	27		2015-08-01 01:51:40	2015-08-01 01:51:40
23	Escuela De Mecánica	29		2015-08-01 01:51:50	2015-08-01 01:51:50
24	Escuela De Industria De La Madera	27		2015-08-01 01:52:02	2015-08-01 01:52:02
25	Escuela De Geomensura	27		2015-08-01 01:52:18	2015-08-01 01:52:18
26	Escuela De Transporte Y Tránsito	27		2015-08-01 01:52:33	2015-08-01 01:52:33
\.


--
-- Name: escuelas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('escuelas_id_seq', 26, true);


--
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY estudiantes (id, carrera_id, rut, nombres, apellidos, email, created_at, updated_at) FROM stdin;
11	11	17746323	Neftali Alexis	Madariaga Castro	tali-tali@live.com	2015-08-01 02:00:29	2015-08-01 02:00:29
17	11	16611241	Juan	Gonzales	correo@falso.cl	2015-08-02 21:44:29	2015-08-02 21:44:29
19	12	17338692	Chino	Chinasky	chino@chinasky.com	2015-08-03 21:35:05	2015-08-03 21:35:05
\.


--
-- Name: estudiantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('estudiantes_id_seq', 19, true);


--
-- Data for Name: facultades; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY facultades (id, nombre, campus_id, descripcion, created_at, updated_at) FROM stdin;
44	Administración Y Economía	66		2015-08-01 01:39:37	2015-08-01 01:39:37
45	Ciencias De La Construcción Y Ordenamiento Territorial	65		2015-08-01 01:39:51	2015-08-01 01:39:51
46	Ciencias Naturales, Matemática Y Del Medio Ambiente	64		2015-08-01 01:40:04	2015-08-01 01:40:04
47	Humanidades Y Tecnologías De La Comunicación Social	65		2015-08-01 01:40:19	2015-08-01 01:40:19
48	Ingeniería	64		2015-08-01 01:40:32	2015-08-01 01:40:32
\.


--
-- Name: facultades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('facultades_id_seq', 48, true);


--
-- Data for Name: funcionarios; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY funcionarios (id, departamento_id, rut, nombres, apellidos, created_at, updated_at) FROM stdin;
8	25	32548962	Mario	Bros	2015-08-02 21:55:45	2015-08-02 21:55:45
9	24	24589632	Luigi	Hermano De Mario	2015-08-02 21:55:46	2015-08-02 21:55:46
10	24	4585799	Loco 	Wom	2015-08-02 21:55:46	2015-08-02 21:55:46
11	18	17746323	Neftali Alexis	Madariaga Castro	2015-08-04 13:09:14	2015-08-04 13:09:14
\.


--
-- Name: funcionarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('funcionarios_id_seq', 11, true);


--
-- Data for Name: horarios; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY horarios (id, fecha, sala_id, periodo_id, curso_id, created_at, updated_at) FROM stdin;
301	2015-08-03	8	5	21	2015-08-04 12:56:14	2015-08-04 12:56:14
302	2015-08-10	8	5	21	2015-08-04 12:56:15	2015-08-04 12:56:15
303	2015-08-04	8	7	18	2015-08-04 13:15:38	2015-08-04 13:15:38
304	2015-08-11	8	7	18	2015-08-04 13:15:38	2015-08-04 13:15:38
258	2015-07-06	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
259	2015-07-13	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
260	2015-07-20	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
261	2015-07-27	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
262	2015-08-03	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
263	2015-08-10	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
264	2015-08-17	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
265	2015-08-24	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
266	2015-08-31	8	1	15	2015-08-03 20:00:06	2015-08-03 20:00:06
268	2015-07-15	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
269	2015-07-22	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
270	2015-07-29	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
271	2015-08-05	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
272	2015-08-12	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
273	2015-08-19	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
274	2015-08-26	8	1	15	2015-08-03 20:00:31	2015-08-03 20:00:31
276	2015-07-10	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
277	2015-07-17	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
278	2015-07-24	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
279	2015-07-31	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
280	2015-08-07	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
281	2015-08-14	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
282	2015-08-21	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
283	2015-08-28	8	1	15	2015-08-03 20:01:13	2015-08-03 20:01:13
300	2015-08-04	8	4	17	2015-08-03 20:09:22	2015-08-03 20:09:22
\.


--
-- Name: horarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('horarios_id_seq', 304, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY migrations (migration, batch) FROM stdin;
2015_06_27_161305_create_user_table	1
2015_07_29_204615_agregar_relacion_estudiantes_usuarios	2
\.


--
-- Data for Name: periodos; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY periodos (id, bloque, inicio, fin, created_at, updated_at) FROM stdin;
1	1	08:00:00	09:30:00	2015-06-15 14:22:10	2015-06-15 14:22:10
2	2	09:40:00	11:10:00	2015-06-15 14:27:18	2015-06-15 14:27:18
3	3	11:20:00	12:50:00	2015-06-15 14:27:42	2015-06-15 14:27:42
4	4	13:00:00	14:30:00	2015-06-15 14:29:52	2015-06-15 14:29:52
5	5	14:40:00	16:10:00	2015-06-15 14:30:28	2015-06-15 14:30:28
6	6	16:20:00	17:50:00	2015-06-15 14:30:56	2015-06-15 14:30:56
7	7	18:00:00	19:30:00	2015-06-15 14:31:24	2015-06-15 14:31:24
8	8	19:00:00	20:30:00	2015-06-15 14:32:28	2015-06-15 14:32:28
9	9	20:40:00	22:10:00	2015-06-15 14:32:58	2015-06-15 14:32:58
\.


--
-- Name: periodos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('periodos_id_seq', 9, true);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY roles (id, nombre, descripcion, created_at, updated_at) FROM stdin;
4	Administrador	asdsadasd	2015-07-13 18:04:13	2015-07-13 18:04:13
5	Encargado	sadasd	2015-07-13 18:55:04	2015-07-13 18:57:26
6	Estudiante	dtfgjhk	2015-07-21 18:23:39	2015-07-21 18:23:39
7	Academico	Asas	2015-07-30 14:12:52	2015-08-04 14:20:24
\.


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('roles_id_seq', 7, true);


--
-- Data for Name: roles_usuarios; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY roles_usuarios (id, rut, rol_id, created_at, updated_at) FROM stdin;
59	17746323	4	2015-08-03 13:38:28	2015-08-03 13:38:28
60	17746323	6	2015-08-03 13:38:39	2015-08-03 13:38:39
61	17746323	5	2015-08-03 13:38:51	2015-08-03 13:38:51
62	17746323	7	2015-08-03 13:39:24	2015-08-03 13:39:24
\.


--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('roles_usuarios_id_seq', 63, true);


--
-- Data for Name: salas; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY salas (id, campus_id, tipo_sala_id, nombre, descripcion, created_at, updated_at) FROM stdin;
8	64	1	M3-100		2015-08-01 02:05:53	2015-08-01 02:05:53
9	64	1	M3-101		2015-08-01 02:06:07	2015-08-01 02:06:07
10	64	1	M3-102		2015-08-01 02:06:17	2015-08-01 02:06:17
11	64	1	M3-103		2015-08-01 02:06:39	2015-08-01 02:06:39
12	65	1	M2-204		2015-08-02 17:58:11	2015-08-02 17:58:11
\.


--
-- Name: salas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('salas_id_seq', 12, true);


--
-- Data for Name: tipos_salas; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY tipos_salas (id, nombre, descripcion, created_at, updated_at) FROM stdin;
1	Normal	Cualquier cosa	2015-06-15 14:23:53	2015-06-15 14:23:53
4	Laboratorio De Informatica	Se encuentra en el 4 piso del m1	2015-07-25 14:47:06	2015-07-25 14:47:06
\.


--
-- Name: tipos_salas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: neftali
--

SELECT pg_catalog.setval('tipos_salas_id_seq', 4, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: neftali
--

COPY usuarios (rut, email, nombres, apellidos, remember_token, created_at, updated_at) FROM stdin;
16611241	\N	\N	\N	luEYUO1teInDuy327KEezhQZplErC075ewkcOs9Sglg9YiY5VkLE9lb6nEr2	2015-07-15 17:51:06	2015-07-24 17:59:24
16123109	\N	\N	\N	U0R8el4Ln06qPh5yH1rsLCWbK7ZwBkvFs4XzitIhPG62TRAGTMzwoY6mP4m0	2015-07-13 18:58:25	2015-07-24 18:01:26
1758955	\N	\N	\N	\N	2015-07-30 18:03:20	2015-07-30 18:03:20
17589555	\N	\N	\N	\N	2015-07-30 18:03:33	2015-07-30 18:03:33
17338692	\N	\N	\N	\N	2015-08-03 21:30:43	2015-08-03 21:30:43
17746323	\N	\N	\N	IqZeATybCy7s7KxuX1gjfiZrdzS9Tx1Xu3b9w4grTZtrNAgrWrf3zmbmSfMa	2015-07-15 18:48:18	2015-08-03 21:43:25
\.


--
-- Name: asignaturas_codigo_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY asignaturas
    ADD CONSTRAINT asignaturas_codigo_key UNIQUE (codigo);


--
-- Name: asignaturas_cursadas_curso_id_estudiante_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY asignaturas_cursadas
    ADD CONSTRAINT asignaturas_cursadas_curso_id_estudiante_id_key UNIQUE (curso_id, estudiante_id);


--
-- Name: asignaturas_cursadas_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY asignaturas_cursadas
    ADD CONSTRAINT asignaturas_cursadas_pkey PRIMARY KEY (id);


--
-- Name: asignaturas_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY asignaturas
    ADD CONSTRAINT asignaturas_pkey PRIMARY KEY (id);


--
-- Name: campus_latitud_longitud_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_latitud_longitud_key UNIQUE (latitud, longitud);


--
-- Name: campus_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_nombre_key UNIQUE (nombre);


--
-- Name: campus_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY campus
    ADD CONSTRAINT campus_pkey PRIMARY KEY (id);


--
-- Name: carreras_codigo_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_codigo_key UNIQUE (codigo);


--
-- Name: carreras_codigo_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_codigo_nombre_key UNIQUE (codigo, nombre);


--
-- Name: carreras_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_pkey PRIMARY KEY (id);


--
-- Name: curso_estudiante_curso_id_estudiante_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY curso_estudiante
    ADD CONSTRAINT curso_estudiante_curso_id_estudiante_id_key UNIQUE (curso_id, estudiante_id);


--
-- Name: curso_estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY curso_estudiante
    ADD CONSTRAINT curso_estudiante_pkey PRIMARY KEY (id);


--
-- Name: cursos_asignatura_id_docente_id_semestre_anio_seccion_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_asignatura_id_docente_id_semestre_anio_seccion_key UNIQUE (asignatura_id, docente_id, semestre, anio, seccion);


--
-- Name: cursos_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (id);


--
-- Name: departamentos_nombre_facultad_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_nombre_facultad_id_key UNIQUE (nombre, facultad_id);


--
-- Name: departamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_pkey PRIMARY KEY (id);


--
-- Name: docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (id);


--
-- Name: docentes_rut_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_rut_key UNIQUE (rut);


--
-- Name: escuelas_nombre_departamento_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_nombre_departamento_id_key UNIQUE (nombre, departamento_id);


--
-- Name: escuelas_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_pkey PRIMARY KEY (id);


--
-- Name: estudiantes_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (id);


--
-- Name: estudiantes_rut_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_rut_key UNIQUE (rut);


--
-- Name: facultades_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_nombre_key UNIQUE (nombre);


--
-- Name: facultades_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_pkey PRIMARY KEY (id);


--
-- Name: funcionarios_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY funcionarios
    ADD CONSTRAINT funcionarios_pkey PRIMARY KEY (id);


--
-- Name: funcionarios_rut_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY funcionarios
    ADD CONSTRAINT funcionarios_rut_key UNIQUE (rut);


--
-- Name: horarios_fecha_sala_id_periodo_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_fecha_sala_id_periodo_id_key UNIQUE (fecha, sala_id, periodo_id);


--
-- Name: horarios_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_pkey PRIMARY KEY (id);


--
-- Name: periodos_bloque_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY periodos
    ADD CONSTRAINT periodos_bloque_key UNIQUE (bloque);


--
-- Name: periodos_inicio_fin_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY periodos
    ADD CONSTRAINT periodos_inicio_fin_key UNIQUE (inicio, fin);


--
-- Name: periodos_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY periodos
    ADD CONSTRAINT periodos_pkey PRIMARY KEY (id);


--
-- Name: roles_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_nombre_key UNIQUE (nombre);


--
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: roles_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_pkey PRIMARY KEY (id);


--
-- Name: roles_usuarios_rut_rol_id_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_rut_rol_id_key UNIQUE (rut, rol_id);


--
-- Name: salas_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY salas
    ADD CONSTRAINT salas_pkey PRIMARY KEY (id);


--
-- Name: salas_tipo_sala_id_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY salas
    ADD CONSTRAINT salas_tipo_sala_id_nombre_key UNIQUE (tipo_sala_id, nombre);


--
-- Name: tipos_salas_nombre_key; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY tipos_salas
    ADD CONSTRAINT tipos_salas_nombre_key UNIQUE (nombre);


--
-- Name: tipos_salas_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY tipos_salas
    ADD CONSTRAINT tipos_salas_pkey PRIMARY KEY (id);


--
-- Name: usuarios_email_unique; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_unique UNIQUE (email);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: neftali; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (rut);


--
-- Name: asignaturas_cursadas_curso_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY asignaturas_cursadas
    ADD CONSTRAINT asignaturas_cursadas_curso_id_fkey FOREIGN KEY (curso_id) REFERENCES cursos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: asignaturas_cursadas_estudiante_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY asignaturas_cursadas
    ADD CONSTRAINT asignaturas_cursadas_estudiante_id_fkey FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: asignaturas_departamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY asignaturas
    ADD CONSTRAINT asignaturas_departamento_id_fkey FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: carreras_escuela_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY carreras
    ADD CONSTRAINT carreras_escuela_id_fkey FOREIGN KEY (escuela_id) REFERENCES escuelas(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: curso_estudiante_curso_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY curso_estudiante
    ADD CONSTRAINT curso_estudiante_curso_id_fkey FOREIGN KEY (curso_id) REFERENCES cursos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: curso_estudiante_estudiante_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY curso_estudiante
    ADD CONSTRAINT curso_estudiante_estudiante_id_fkey FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cursos_asignatura_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_asignatura_id_fkey FOREIGN KEY (asignatura_id) REFERENCES asignaturas(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cursos_docente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_docente_id_fkey FOREIGN KEY (docente_id) REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: departamentos_facultad_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_facultad_id_fkey FOREIGN KEY (facultad_id) REFERENCES facultades(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: docentes_departamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_departamento_id_fkey FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: escuelas_departamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY escuelas
    ADD CONSTRAINT escuelas_departamento_id_fkey FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiantes_carrera_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_carrera_id_fkey FOREIGN KEY (carrera_id) REFERENCES carreras(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiantes_rut_foreign; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY estudiantes
    ADD CONSTRAINT estudiantes_rut_foreign FOREIGN KEY (rut) REFERENCES usuarios(rut);


--
-- Name: facultades_campus_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_campus_id_fkey FOREIGN KEY (campus_id) REFERENCES campus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: funcionarios_departamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY funcionarios
    ADD CONSTRAINT funcionarios_departamento_id_fkey FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: horarios_curso_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_curso_id_fkey FOREIGN KEY (curso_id) REFERENCES cursos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: horarios_sala_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_sala_id_fkey FOREIGN KEY (sala_id) REFERENCES salas(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: salas_campus_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY salas
    ADD CONSTRAINT salas_campus_id_fkey FOREIGN KEY (campus_id) REFERENCES campus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: salas_tipo_sala_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: neftali
--

ALTER TABLE ONLY salas
    ADD CONSTRAINT salas_tipo_sala_id_fkey FOREIGN KEY (tipo_sala_id) REFERENCES tipos_salas(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

