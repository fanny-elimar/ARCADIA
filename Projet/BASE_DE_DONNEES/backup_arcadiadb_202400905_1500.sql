--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

-- Started on 2024-09-05 15:01:54

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16412)
-- Name: arc_animal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_animal (
    an_id integer NOT NULL,
    an_name character varying(60) NOT NULL,
    an_species character varying(60),
    an_images character varying(255),
    an_ha_id integer NOT NULL,
    an_extra_images text,
    an_en_name character varying(60)
);


ALTER TABLE public.arc_animal OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16411)
-- Name: animal_an_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.animal_an_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.animal_an_id_seq OWNER TO postgres;

--
-- TOC entry 4903 (class 0 OID 0)
-- Dependencies: 217
-- Name: animal_an_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.animal_an_id_seq OWNED BY public.arc_animal.an_id;


--
-- TOC entry 235 (class 1259 OID 16723)
-- Name: arc_enclosure; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.arc_enclosure (
    en_name character varying(60) NOT NULL,
    en_comment text
);


ALTER TABLE public.arc_enclosure OWNER TO "user";

--
-- TOC entry 226 (class 1259 OID 16495)
-- Name: arc_review; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_review (
    re_id integer NOT NULL,
    re_pseudo character varying(60) NOT NULL,
    re_review text NOT NULL,
    re_approved boolean,
    re_date date DEFAULT CURRENT_DATE NOT NULL
);


ALTER TABLE public.arc_review OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16494)
-- Name: arc_eview_re_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_eview_re_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_eview_re_id_seq OWNER TO postgres;

--
-- TOC entry 4904 (class 0 OID 0)
-- Dependencies: 225
-- Name: arc_eview_re_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_eview_re_id_seq OWNED BY public.arc_review.re_id;


--
-- TOC entry 232 (class 1259 OID 16545)
-- Name: arc_feeding; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_feeding (
    fe_id integer NOT NULL,
    fe_fo_id integer NOT NULL,
    fe_an_id integer NOT NULL,
    fe_quantity real NOT NULL,
    fe_date date NOT NULL,
    fe_time time without time zone NOT NULL
);


ALTER TABLE public.arc_feeding OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 16544)
-- Name: arc_feeding_fe_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_feeding_fe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_feeding_fe_id_seq OWNER TO postgres;

--
-- TOC entry 4905 (class 0 OID 0)
-- Dependencies: 231
-- Name: arc_feeding_fe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_feeding_fe_id_seq OWNED BY public.arc_feeding.fe_id;


--
-- TOC entry 222 (class 1259 OID 16445)
-- Name: arc_food; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_food (
    fo_id integer NOT NULL,
    fo_type character varying(255) NOT NULL
);


ALTER TABLE public.arc_food OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16401)
-- Name: arc_habitat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_habitat (
    ha_id integer NOT NULL,
    ha_name character varying(60) NOT NULL,
    ha_description text,
    ha_images character varying(255),
    ha_comment text
);


ALTER TABLE public.arc_habitat OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 16736)
-- Name: arc_horaire; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.arc_horaire (
    ho_id integer NOT NULL,
    ho_periode_start date NOT NULL,
    ho_periode_end date NOT NULL,
    ho_days character varying(255) NOT NULL,
    ho_time_start time without time zone NOT NULL,
    ho_time_end time without time zone NOT NULL
);


ALTER TABLE public.arc_horaire OWNER TO "user";

--
-- TOC entry 236 (class 1259 OID 16735)
-- Name: arc_horaires_ho_id_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.arc_horaires_ho_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_horaires_ho_id_seq OWNER TO "user";

--
-- TOC entry 4906 (class 0 OID 0)
-- Dependencies: 236
-- Name: arc_horaires_ho_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.arc_horaires_ho_id_seq OWNED BY public.arc_horaire.ho_id;


--
-- TOC entry 233 (class 1259 OID 16703)
-- Name: arc_image_animal; Type: TABLE; Schema: public; Owner: user
--

CREATE TABLE public.arc_image_animal (
    im_an_filename character varying(255) NOT NULL,
    im_an_an_id integer NOT NULL,
    im_an_id integer NOT NULL
);


ALTER TABLE public.arc_image_animal OWNER TO "user";

--
-- TOC entry 234 (class 1259 OID 16715)
-- Name: arc_image_animal_im_an_id_seq; Type: SEQUENCE; Schema: public; Owner: user
--

CREATE SEQUENCE public.arc_image_animal_im_an_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_image_animal_im_an_id_seq OWNER TO "user";

--
-- TOC entry 4907 (class 0 OID 0)
-- Dependencies: 234
-- Name: arc_image_animal_im_an_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: user
--

ALTER SEQUENCE public.arc_image_animal_im_an_id_seq OWNED BY public.arc_image_animal.im_an_id;


--
-- TOC entry 230 (class 1259 OID 16528)
-- Name: arc_instruction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_instruction (
    in_id integer NOT NULL,
    in_fo_id integer NOT NULL,
    in_an_id integer NOT NULL,
    in_quantity real
);


ALTER TABLE public.arc_instruction OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 16527)
-- Name: arc_instruction_in_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_instruction_in_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_instruction_in_id_seq OWNER TO postgres;

--
-- TOC entry 4908 (class 0 OID 0)
-- Dependencies: 229
-- Name: arc_instruction_in_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_instruction_in_id_seq OWNED BY public.arc_instruction.in_id;


--
-- TOC entry 224 (class 1259 OID 16486)
-- Name: arc_service; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_service (
    se_id integer NOT NULL,
    se_name character varying(255) NOT NULL,
    se_description text,
    se_images character varying(255),
    se_info text
);


ALTER TABLE public.arc_service OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16485)
-- Name: arc_service_se_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_service_se_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_service_se_id_seq OWNER TO postgres;

--
-- TOC entry 4909 (class 0 OID 0)
-- Dependencies: 223
-- Name: arc_service_se_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_service_se_id_seq OWNED BY public.arc_service.se_id;


--
-- TOC entry 228 (class 1259 OID 16504)
-- Name: arc_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_user (
    us_id integer NOT NULL,
    us_email character varying(60) NOT NULL,
    us_password character varying(255) NOT NULL,
    us_role character varying(60) NOT NULL,
    us_fname character varying(60)
);


ALTER TABLE public.arc_user OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16503)
-- Name: arc_user_us_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_user_us_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_user_us_id_seq OWNER TO postgres;

--
-- TOC entry 4910 (class 0 OID 0)
-- Dependencies: 227
-- Name: arc_user_us_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_user_us_id_seq OWNED BY public.arc_user.us_id;


--
-- TOC entry 220 (class 1259 OID 16419)
-- Name: arc_visit; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_visit (
    vi_id integer NOT NULL,
    vi_condition character varying(255) NOT NULL,
    vi_date date NOT NULL,
    vi_condition_details text,
    vi_an_id integer NOT NULL
);


ALTER TABLE public.arc_visit OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16444)
-- Name: food_fo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.food_fo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.food_fo_id_seq OWNER TO postgres;

--
-- TOC entry 4911 (class 0 OID 0)
-- Dependencies: 221
-- Name: food_fo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.food_fo_id_seq OWNED BY public.arc_food.fo_id;


--
-- TOC entry 215 (class 1259 OID 16400)
-- Name: habitat_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.habitat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.habitat_id_seq OWNER TO postgres;

--
-- TOC entry 4912 (class 0 OID 0)
-- Dependencies: 215
-- Name: habitat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.habitat_id_seq OWNED BY public.arc_habitat.ha_id;


--
-- TOC entry 219 (class 1259 OID 16418)
-- Name: visit_vi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.visit_vi_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.visit_vi_id_seq OWNER TO postgres;

--
-- TOC entry 4913 (class 0 OID 0)
-- Dependencies: 219
-- Name: visit_vi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.visit_vi_id_seq OWNED BY public.arc_visit.vi_id;


--
-- TOC entry 4689 (class 2604 OID 16415)
-- Name: arc_animal an_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal ALTER COLUMN an_id SET DEFAULT nextval('public.animal_an_id_seq'::regclass);


--
-- TOC entry 4697 (class 2604 OID 16548)
-- Name: arc_feeding fe_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding ALTER COLUMN fe_id SET DEFAULT nextval('public.arc_feeding_fe_id_seq'::regclass);


--
-- TOC entry 4691 (class 2604 OID 16448)
-- Name: arc_food fo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_food ALTER COLUMN fo_id SET DEFAULT nextval('public.food_fo_id_seq'::regclass);


--
-- TOC entry 4688 (class 2604 OID 16404)
-- Name: arc_habitat ha_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_habitat ALTER COLUMN ha_id SET DEFAULT nextval('public.habitat_id_seq'::regclass);


--
-- TOC entry 4699 (class 2604 OID 16739)
-- Name: arc_horaire ho_id; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_horaire ALTER COLUMN ho_id SET DEFAULT nextval('public.arc_horaires_ho_id_seq'::regclass);


--
-- TOC entry 4698 (class 2604 OID 16716)
-- Name: arc_image_animal im_an_id; Type: DEFAULT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_image_animal ALTER COLUMN im_an_id SET DEFAULT nextval('public.arc_image_animal_im_an_id_seq'::regclass);


--
-- TOC entry 4696 (class 2604 OID 16531)
-- Name: arc_instruction in_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction ALTER COLUMN in_id SET DEFAULT nextval('public.arc_instruction_in_id_seq'::regclass);


--
-- TOC entry 4693 (class 2604 OID 16498)
-- Name: arc_review re_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_review ALTER COLUMN re_id SET DEFAULT nextval('public.arc_eview_re_id_seq'::regclass);


--
-- TOC entry 4692 (class 2604 OID 16489)
-- Name: arc_service se_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_service ALTER COLUMN se_id SET DEFAULT nextval('public.arc_service_se_id_seq'::regclass);


--
-- TOC entry 4695 (class 2604 OID 16507)
-- Name: arc_user us_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_user ALTER COLUMN us_id SET DEFAULT nextval('public.arc_user_us_id_seq'::regclass);


--
-- TOC entry 4690 (class 2604 OID 16422)
-- Name: arc_visit vi_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_visit ALTER COLUMN vi_id SET DEFAULT nextval('public.visit_vi_id_seq'::regclass);


--
-- TOC entry 4878 (class 0 OID 16412)
-- Dependencies: 218
-- Data for Name: arc_animal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_animal (an_id, an_name, an_species, an_images, an_ha_id, an_extra_images, an_en_name) FROM stdin;
13	Simba	lion	669f71d17bc1b-simba1.webp	2	\N	J1
9	Cleo	toucan	6691390f04263-cleo1.webp	1	\N	J7
19	Arya	antilope	66d9361c5246b-aliza.webp	2	\N	J2
1	Jo	babouin	66920b7ed4ac0-jo1.webp	1	\N	J1
2	Lola	babouin	66920b939f893-lola1.webp	1	\N	J1
15	Zoe	zèbre	669f71fbca675-zoe.webp	2	\N	J2
16	Zelia	zèbre	669f72202a8fd-zelia.webp	2	\N	J2
18	Gisèle	girafe	669f7254a1afd-gisele.webp	2	\N	J2
20	Aliza	antilope	669f727cc8c38-aliza.webp	2	\N	J2
21	Antou	antilope	669f728f323ce-antou.webp	2	\N	J2
23	Elika	éléphant	669f72df67565-elika.webp	2	\N	J2
22	Ellie	éléphant	669fae27d2828-ellie.webp	2	\N	J2
17	Gina	girafe	669faeab4b34f-gina.webp	2	\N	J2
38	flamou	flamand rose	66a905a7a13c0-flamingos-6945385-1280.jpg	3	\N	M5
8	Mia	ara	66adcdcb65f08-mia1.webp	1	\N	J6
39	Eddy	Cormoran	66d19389417d0-cormoran-1.webp	3	\N	M1
40	Edna	Cormoran	66d1939fe7ae4-cormoran-2.webp	3	\N	M1
41	Hulk	Elan	66d193bf704d2-elan1.webp	3	\N	M3
42	Kenna	Elan	66d193fe40ff0-elan2.webp	3	\N	M3
43	Ron	Héron garde-boeuf	66d194275a784-heron-garde-boeuf.webp	3	\N	M1
44	osiris	Ibis falcinelle	66d194453dff8-ibis-falcinelle.webp	3	\N	M5
45	isis	Ibis falcinelle	66d1945003ee5-ibis-falcinelle2.webp	3	\N	M5
46	Jack	pelican	66d1946b68d55-pelican1.webp	3	\N	M1
47	Judy	pelican	66d19478da714-pelican2.webp	3	\N	M1
52	Michelangela	tortue de Floride	66d194f0498ac-tortue-floride-1.webp	3	\N	M4
53	Donatello	tortue de Floride	66d194fd2dfdd-tortue-floride-2.webp	3	\N	M4
51	whity	Spatule blanche	66d194d78058a-spatule-blanche-2.webp	3	\N	M5
48	Roger	ragondin	66d195692a847-ragondin1.webp	3	\N	M2
49	Riva	ragondin	66d1957e3d5e0-ragondin2.webp	3	\N	M2
4	Siko	boa	6691377487428-siko1.webp	1	\N	J3
3	Lilou	chimpanzé	66913742b761e-lilou1.webp	1	\N	J1
5	Bali	python	6691386932ca4-bali1.webp	1	\N	J4
50	bianca	Spatule blanche	66d1959e27f16-spatule-blanche-1.webp	3	\N	M5
6	Tom	gecko	669138b16096d-tom1.webp	1	\N	J5
7	Ari	ara	669138e317cec-ari1.webp	1	\N	J6
14	Zephir	zèbre	669f71e8e042e-zephir.webp	2	\N	J2
\.


--
-- TOC entry 4895 (class 0 OID 16723)
-- Dependencies: 235
-- Data for Name: arc_enclosure; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.arc_enclosure (en_name, en_comment) FROM stdin;
J2	\N
M1	\N
M2	\N
M3	\N
M4	\N
J3	\N
J4	\N
J5	\N
J6	\N
J7	\N
	\N
M5	\N
J1	branche cassée
\.


--
-- TOC entry 4892 (class 0 OID 16545)
-- Dependencies: 232
-- Data for Name: arc_feeding; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_feeding (fe_id, fe_fo_id, fe_an_id, fe_quantity, fe_date, fe_time) FROM stdin;
\.


--
-- TOC entry 4882 (class 0 OID 16445)
-- Dependencies: 222
-- Data for Name: arc_food; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_food (fo_id, fo_type) FROM stdin;
11	granulés mix 1
12	granulés mix 2
13	granulés mix 3
14	granulés mix 4
15	granulés mix 5
16	granulés mix 6
17	granulé mix 7
18	viande rouge
19	viande blanche
20	légumes frais
21	fruits frais
22	foin
\.


--
-- TOC entry 4876 (class 0 OID 16401)
-- Dependencies: 216
-- Data for Name: arc_habitat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_habitat (ha_id, ha_name, ha_description, ha_images, ha_comment) FROM stdin;
3	les marais	L'espace marais de notre zoo vous plonge dans l'atmosphère des zones humides. En avançant sur des passerelles surélevées, vous pourrez admirer des étendues d'eau bordées de joncs et de nénuphars. Des tortues paressent sur des troncs d'arbres émergés, tandis que des alligators se dissimulent à peine sous la surface calme de l'eau. Des oiseaux, comme les hérons et les ibis, picorent dans les marécages à la recherche de leur prochain repas. Vous découvrirez également une variété de poissons et d'amphibiens. Des panneaux informatifs racontent l'importance écologique des marais et la diversité des espèces qui y vivent. Vous apprécierez cette promenade relaxante au cœur de ce biotope fascinant et vital.	669f9aa875f3b-marais.jpg	\N
1	la jungle	L'espace jungle de notre zoo est une immersion totale dans l'exubérante forêt tropicale. Dès votre entrée, une végétation luxuriante vous entoure, avec des lianes pendantes, des fougères géantes et des arbres imposants abritant une multitude de créatures exotiques. Vous pouvez apercevoir des singes espiègles se balancer de branche en branche, tandis que des perroquets colorés survolent les sentiers. Des panneaux éducatifs jalonnent le parcours, offrant des informations fascinantes sur les espèces végétales et animales de la jungle. L'humidité ambiante et les sons envoûtants de la faune créent une expérience sensorielle unique, transportant les visiteurs au cœur de la nature sauvage.	6681b47c71a9b-jungle.webp	\N
2	la savane	L'espace savane de notre zoo vous transporte au cœur des vastes plaines africaines. Des troupeaux de zèbres et d'antilopes se déplacent librement, tandis que les girafes graciles s'élèvent au-dessus des arbres pour brouter les feuilles. Plus loin, vous pourrez observer des éléphants se rafraîchir dans une mare, et peut-être apercevoir un lion se prélassant à l'ombre. Des points d'observation stratégiques permettent une vue imprenable sur ces animaux emblématiques, accompagnés de panneaux explicatifs sur leur habitat et leur comportement. L'expérience est enrichie par des sons réalistes de la savane, créant une immersion totale dans cet écosystème fascinant.	6681b4a291e74-savane.webp	\N
\.


--
-- TOC entry 4897 (class 0 OID 16736)
-- Dependencies: 237
-- Data for Name: arc_horaire; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.arc_horaire (ho_id, ho_periode_start, ho_periode_end, ho_days, ho_time_start, ho_time_end) FROM stdin;
2	2024-07-03	2024-07-31	tous les jours	09:00:00	19:00:00
1	2024-07-12	2024-07-31	tous les jours	10:00:00	19:00:00
3	2024-05-01	2024-06-30	Week-ends et jours fériés	10:00:00	17:00:00
\.


--
-- TOC entry 4893 (class 0 OID 16703)
-- Dependencies: 233
-- Data for Name: arc_image_animal; Type: TABLE DATA; Schema: public; Owner: user
--

COPY public.arc_image_animal (im_an_filename, im_an_an_id, im_an_id) FROM stdin;
6691392e07e71-jo2.webp	1	20
669f71c87d48b-simba2.webp	13	23
669f720447203-zoezelia.webp	15	24
669f7228866bf-zoezelia.webp	16	25
66a9065654c5a-flamingos-6945385-1280.jpg	38	26
66af0a2e52019-lola1.webp	1	27
66d1954513592-spatule-blanche-3.webp	51	28
66d1955a4f23f-ragondin3.webp	48	29
66d195797e3aa-ragondin3.webp	49	30
66d1958c6a9d8-spatule-blanche-3.webp	50	31
66d195ac92041-tortue-floride-3.webp	52	32
66d195bf3de3a-tortue-floride-3.webp	53	33
\.


--
-- TOC entry 4890 (class 0 OID 16528)
-- Dependencies: 230
-- Data for Name: arc_instruction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_instruction (in_id, in_fo_id, in_an_id, in_quantity) FROM stdin;
\.


--
-- TOC entry 4886 (class 0 OID 16495)
-- Dependencies: 226
-- Data for Name: arc_review; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_review (re_id, re_pseudo, re_review, re_approved, re_date) FROM stdin;
1	Marie63	Nous avons passé une superbe journée à Arcadia. C’est un plaisir de voir que les animaux sont si bien traités :)	t	2024-06-13
2	Paul.legarec	Bravo pour ce joli parc, toute la famille a adoré !	t	2024-06-13
3	Julie87	Quel plaisir de voir un parc où les animaux sont si bien traités ! Nous avons aimé les explications des guides.	t	2024-06-13
9	Cyprien	J'ai passé une super journée !	f	2024-06-13
375	Lucas	Superbe journée!	t	2024-06-25
4	Anna	Tres beau zoo.	t	2024-06-13
5	jacques	Très beau zoo.	t	2024-06-13
8	Paul	Super journée	t	2024-06-13
372	Eline	J'ai passé une super journée !	t	2024-06-14
6	Tom	Beaucoup de monde aujourd'hui, ce qui a un peu gâché le plaisir...	t	2024-06-13
373	Jules	Super journée	t	2024-06-14
\.


--
-- TOC entry 4884 (class 0 OID 16486)
-- Dependencies: 224
-- Data for Name: arc_service; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_service (se_id, se_name, se_description, se_images, se_info) FROM stdin;
11	restauration	Notre zoo propose une variété de services de restauration pour satisfaire toutes vos envies culinaires pendant votre visite. Vous trouverez plusieurs snacks disséminés dans le parc, offrant des en-cas rapides comme des sandwiches, des fruits frais et des boissons rafraîchissantes. Pour une pause gourmande, arrêtez-vous à l'un de nos stands de glace, où des délices glacés aux saveurs variées raviront petits et grands. Pour un repas plus complet, notre restaurant vous accueille dans un cadre convivial, avec un menu diversifié comprenant des plats chauds, des salades, et des options végétariennes. Des aires de pique-nique ont également été aménagées dans chaque espace.	667e5ffb8919f-restaurant.webp	Le restaurant est ouvert de 11h30 à 15h00.\r\nLes horaires des autres points de restauration sont indiqués à l'entrée du parc.
12	petit train	Embarquez à bord de notre petit train, qui vous conduira à travers les différentes zones du parc, telles que la jungle, la savane et les marais. Conçu pour toute la famille, ce moyen de transport pratique permet de profiter d'une vue panoramique sur les habitats et les animaux, tout en se relaxant. Le petit train est commenté, offrant des informations intéressantes et des anecdotes amusantes sur les espèces que vous croisez. C'est l'occasion idéale pour découvrir le zoo sans fatigue. Rejoignez-nous pour une expérience mémorable et conviviale, qui plaira aux petits comme aux grands. 	667e5efd0116f-petit-train.webp	 Le départ du petit train à lieu à l'entrée du parc. En été, le petit train démarre toutes les heures. le reste de l'année, les départs ont lieu à 9h30, 11h, 13h30 et 15h.\r\n Tarif :\r\nAdulte : 5€\r\nTarif réduit (-16 ans, +60ans) : 3€
10	visite guidée des habitats	Profitez de visites guidées gratuites des habitats. Elles vous permettront de découvrir nos animaux de manière enrichissante et éducative. Chaque visite est une occasion d'apprendre des anecdotes fascinantes sur les espèces que vous rencontrez, leurs comportements et leurs habitats naturels. Les guides sont également disponibles pour répondre à vos questions et partager des faits surprenants. Ces visites guidées sont idéales pour tous les âges, offrant une expérience immersive et interactive qui enrichira votre visite et vous laissera avec des souvenirs inoubliables.	667e5e90e16be-visite-guidee.webp	Les visites guidées durent 30 min.\r\n En été, des visites sont prévues toutes les heures pour chaque habitat. Le reste de l'année, 3 visites par jour sont prévues pour chaque habitat.
\.


--
-- TOC entry 4888 (class 0 OID 16504)
-- Dependencies: 228
-- Data for Name: arc_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_user (us_id, us_email, us_password, us_role, us_fname) FROM stdin;
2	admin@admin.fr	$2y$10$.7/T3SN97GXFUjUUYRzh5eSn4guN.2qrJXQX5XcAZyXymprY43CAW	admin	\N
1	veto@veto.fr	$2y$10$EsC91.V9gEtw9Qp6r4C5m.NX2MIEIgLqWIRWoQBc9O00A1gFgeQx6	vet	\N
3	zoe@employe.fr	$2y$10$UAwytz49k7DtUzZYjHYeBOYQR8yziHmo.7c.8SWLIAHxFJd6iKrrC	employe	Zoé
29	louisa@employe.fr	$2y$10$ZigA1U.6XMVMAzxgw6NKku8Eseb7QfZ2TE.RRniRHwuG7FhTNQ2d.	employe	Louisa
\.


--
-- TOC entry 4880 (class 0 OID 16419)
-- Dependencies: 220
-- Data for Name: arc_visit; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_visit (vi_id, vi_condition, vi_date, vi_condition_details, vi_an_id) FROM stdin;
1	En forme	2024-06-18		1
2	En forme	2024-06-18		1
3	En forme	2024-06-18		1
4	En forme	2024-06-18		1
7	En forme	2024-06-17		2
8	En forme	2024-06-17		2
9	En forme	2024-06-17		2
10	En forme	2024-06-17		2
11	En forme	2024-06-17		2
12	En forme	2024-06-17		2
13	moyen	2024-06-16		2
14	moyen	2024-06-16		2
15	En forme	2024-06-15		2
16	En forme	2024-06-15		2
17	En forme	2024-06-15		2
18	En forme	2024-06-15		2
19	En forme	2024-06-13		1
20	En forme	2024-06-12		1
21	malade	2024-06-18		4
23	moyen	2024-06-19	Un peu fatigu‚	5
30	moyen	2024-06-20		5
32	fatigu‚	2024-06-25	\N	2
\.


--
-- TOC entry 4914 (class 0 OID 0)
-- Dependencies: 217
-- Name: animal_an_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.animal_an_id_seq', 53, true);


--
-- TOC entry 4915 (class 0 OID 0)
-- Dependencies: 225
-- Name: arc_eview_re_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_eview_re_id_seq', 380, true);


--
-- TOC entry 4916 (class 0 OID 0)
-- Dependencies: 231
-- Name: arc_feeding_fe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_feeding_fe_id_seq', 11, true);


--
-- TOC entry 4917 (class 0 OID 0)
-- Dependencies: 236
-- Name: arc_horaires_ho_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.arc_horaires_ho_id_seq', 5, true);


--
-- TOC entry 4918 (class 0 OID 0)
-- Dependencies: 234
-- Name: arc_image_animal_im_an_id_seq; Type: SEQUENCE SET; Schema: public; Owner: user
--

SELECT pg_catalog.setval('public.arc_image_animal_im_an_id_seq', 33, true);


--
-- TOC entry 4919 (class 0 OID 0)
-- Dependencies: 229
-- Name: arc_instruction_in_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_instruction_in_id_seq', 28, true);


--
-- TOC entry 4920 (class 0 OID 0)
-- Dependencies: 223
-- Name: arc_service_se_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_service_se_id_seq', 17, true);


--
-- TOC entry 4921 (class 0 OID 0)
-- Dependencies: 227
-- Name: arc_user_us_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_user_us_id_seq', 29, true);


--
-- TOC entry 4922 (class 0 OID 0)
-- Dependencies: 221
-- Name: food_fo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.food_fo_id_seq', 22, true);


--
-- TOC entry 4923 (class 0 OID 0)
-- Dependencies: 215
-- Name: habitat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.habitat_id_seq', 5, true);


--
-- TOC entry 4924 (class 0 OID 0)
-- Dependencies: 219
-- Name: visit_vi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visit_vi_id_seq', 34, true);


--
-- TOC entry 4703 (class 2606 OID 16417)
-- Name: arc_animal animal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT animal_pkey PRIMARY KEY (an_id);


--
-- TOC entry 4721 (class 2606 OID 16729)
-- Name: arc_enclosure arc_enclosures_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_enclosure
    ADD CONSTRAINT arc_enclosures_pkey PRIMARY KEY (en_name);


--
-- TOC entry 4711 (class 2606 OID 16502)
-- Name: arc_review arc_eview_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_review
    ADD CONSTRAINT arc_eview_pkey PRIMARY KEY (re_id);


--
-- TOC entry 4717 (class 2606 OID 16550)
-- Name: arc_feeding arc_feeding_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_pkey PRIMARY KEY (fe_id);


--
-- TOC entry 4723 (class 2606 OID 16741)
-- Name: arc_horaire arc_horaires_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_horaire
    ADD CONSTRAINT arc_horaires_pkey PRIMARY KEY (ho_id);


--
-- TOC entry 4719 (class 2606 OID 16718)
-- Name: arc_image_animal arc_image_animal_pkey; Type: CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_image_animal
    ADD CONSTRAINT arc_image_animal_pkey PRIMARY KEY (im_an_id);


--
-- TOC entry 4715 (class 2606 OID 16533)
-- Name: arc_instruction arc_instruction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_pkey PRIMARY KEY (in_id);


--
-- TOC entry 4709 (class 2606 OID 16493)
-- Name: arc_service arc_service_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_service
    ADD CONSTRAINT arc_service_pkey PRIMARY KEY (se_id);


--
-- TOC entry 4713 (class 2606 OID 16509)
-- Name: arc_user arc_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_user
    ADD CONSTRAINT arc_user_pkey PRIMARY KEY (us_id);


--
-- TOC entry 4707 (class 2606 OID 16450)
-- Name: arc_food food_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_food
    ADD CONSTRAINT food_pkey PRIMARY KEY (fo_id);


--
-- TOC entry 4701 (class 2606 OID 16408)
-- Name: arc_habitat habitat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_habitat
    ADD CONSTRAINT habitat_pkey PRIMARY KEY (ha_id);


--
-- TOC entry 4705 (class 2606 OID 16426)
-- Name: arc_visit visit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT visit_pkey PRIMARY KEY (vi_id);


--
-- TOC entry 4724 (class 2606 OID 16672)
-- Name: arc_animal arc_animal_an_ha_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT arc_animal_an_ha_id_fkey FOREIGN KEY (an_ha_id) REFERENCES public.arc_habitat(ha_id) ON DELETE CASCADE;


--
-- TOC entry 4729 (class 2606 OID 16556)
-- Name: arc_feeding arc_feeding_fe_animal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_animal_id_fkey FOREIGN KEY (fe_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- TOC entry 4730 (class 2606 OID 16883)
-- Name: arc_feeding arc_feeding_fe_food_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_food_id_fkey FOREIGN KEY (fe_fo_id) REFERENCES public.arc_food(fo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 4731 (class 2606 OID 16708)
-- Name: arc_image_animal arc_image_animal_im_an_an_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: user
--

ALTER TABLE ONLY public.arc_image_animal
    ADD CONSTRAINT arc_image_animal_im_an_an_id_fkey FOREIGN KEY (im_an_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- TOC entry 4727 (class 2606 OID 16539)
-- Name: arc_instruction arc_instruction_in_animal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_animal_id_fkey FOREIGN KEY (in_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- TOC entry 4728 (class 2606 OID 16878)
-- Name: arc_instruction arc_instruction_in_food_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_food_id_fkey FOREIGN KEY (in_fo_id) REFERENCES public.arc_food(fo_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 4726 (class 2606 OID 16677)
-- Name: arc_visit arc_visit_vi_an_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT arc_visit_vi_an_id_fkey FOREIGN KEY (vi_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- TOC entry 4725 (class 2606 OID 16730)
-- Name: arc_animal enclosure_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT enclosure_fk FOREIGN KEY (an_en_name) REFERENCES public.arc_enclosure(en_name) ON DELETE RESTRICT;


-- Completed on 2024-09-05 15:01:54

--
-- PostgreSQL database dump complete
--

