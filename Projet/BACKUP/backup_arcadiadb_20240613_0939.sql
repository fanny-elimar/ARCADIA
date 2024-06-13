toc.dat                                                                                             0000600 0004000 0002000 00000056117 14632521101 0014444 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP   ,    '    	            |        	   arcadiadb    16.0    16.0 Q               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                    0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                    0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                    1262    16399 	   arcadiadb    DATABASE     |   CREATE DATABASE arcadiadb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
    DROP DATABASE arcadiadb;
                user    false                    0    0    DATABASE arcadiadb    ACL     k   REVOKE ALL ON DATABASE arcadiadb FROM "user";
GRANT ALL ON DATABASE arcadiadb TO "user" WITH GRANT OPTION;
                   user    false    4883         �            1259    16412 
   arc_animal    TABLE     �   CREATE TABLE public.arc_animal (
    an_id integer NOT NULL,
    an_name character varying(60) NOT NULL,
    an_species character varying(60),
    an_images character varying(255)
);
    DROP TABLE public.arc_animal;
       public         heap    postgres    false         �            1259    16411    animal_an_id_seq    SEQUENCE     �   CREATE SEQUENCE public.animal_an_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.animal_an_id_seq;
       public          postgres    false    218                    0    0    animal_an_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.animal_an_id_seq OWNED BY public.arc_animal.an_id;
          public          postgres    false    217         �            1259    16511    arc_animal_visit    TABLE     �   CREATE TABLE public.arc_animal_visit (
    av_id integer NOT NULL,
    av_animal_id integer NOT NULL,
    av_visit_id integer NOT NULL
);
 $   DROP TABLE public.arc_animal_visit;
       public         heap    postgres    false         �            1259    16510    arc_animal_visit_av_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_animal_visit_av_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.arc_animal_visit_av_id_seq;
       public          postgres    false    230                    0    0    arc_animal_visit_av_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.arc_animal_visit_av_id_seq OWNED BY public.arc_animal_visit.av_id;
          public          postgres    false    229         �            1259    16495 
   arc_review    TABLE     �   CREATE TABLE public.arc_review (
    re_id integer NOT NULL,
    re_pseudo character varying(60) NOT NULL,
    re_review text NOT NULL,
    re_approved boolean
);
    DROP TABLE public.arc_review;
       public         heap    postgres    false         �            1259    16494    arc_eview_re_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_eview_re_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.arc_eview_re_id_seq;
       public          postgres    false    226                    0    0    arc_eview_re_id_seq    SEQUENCE OWNED BY     L   ALTER SEQUENCE public.arc_eview_re_id_seq OWNED BY public.arc_review.re_id;
          public          postgres    false    225         �            1259    16545    arc_feeding    TABLE     �   CREATE TABLE public.arc_feeding (
    fe_id integer NOT NULL,
    fe_food_id integer NOT NULL,
    fe_animal_id integer NOT NULL,
    fe_quantity real NOT NULL,
    fe_date date NOT NULL,
    fe_time time without time zone NOT NULL
);
    DROP TABLE public.arc_feeding;
       public         heap    postgres    false         �            1259    16544    arc_feeding_fe_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_feeding_fe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.arc_feeding_fe_id_seq;
       public          postgres    false    234                    0    0    arc_feeding_fe_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.arc_feeding_fe_id_seq OWNED BY public.arc_feeding.fe_id;
          public          postgres    false    233         �            1259    16445    arc_food    TABLE     j   CREATE TABLE public.arc_food (
    fo_id integer NOT NULL,
    fo_type character varying(255) NOT NULL
);
    DROP TABLE public.arc_food;
       public         heap    postgres    false         �            1259    16401    arc_habitat    TABLE     �   CREATE TABLE public.arc_habitat (
    ha_id integer NOT NULL,
    ha_name character varying(60) NOT NULL,
    ha_description text,
    ha_images character varying(255),
    ha_comment text
);
    DROP TABLE public.arc_habitat;
       public         heap    postgres    false         �            1259    16528    arc_instruction    TABLE     �   CREATE TABLE public.arc_instruction (
    in_id integer NOT NULL,
    in_food_id integer NOT NULL,
    in_animal_id integer NOT NULL,
    in_quantity real
);
 #   DROP TABLE public.arc_instruction;
       public         heap    postgres    false         �            1259    16527    arc_instruction_in_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_instruction_in_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.arc_instruction_in_id_seq;
       public          postgres    false    232                    0    0    arc_instruction_in_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.arc_instruction_in_id_seq OWNED BY public.arc_instruction.in_id;
          public          postgres    false    231         �            1259    16486    arc_service    TABLE     �   CREATE TABLE public.arc_service (
    se_id integer NOT NULL,
    se_name character varying(255) NOT NULL,
    se_description text,
    se_images character varying(255)
);
    DROP TABLE public.arc_service;
       public         heap    postgres    false         �            1259    16485    arc_service_se_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_service_se_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.arc_service_se_id_seq;
       public          postgres    false    224                    0    0    arc_service_se_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.arc_service_se_id_seq OWNED BY public.arc_service.se_id;
          public          postgres    false    223         �            1259    16504    arc_user    TABLE     �   CREATE TABLE public.arc_user (
    us_id integer NOT NULL,
    us_email character varying(60) NOT NULL,
    us_password character varying(255) NOT NULL,
    us_role character varying(60) NOT NULL
);
    DROP TABLE public.arc_user;
       public         heap    postgres    false         �            1259    16503    arc_user_us_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_user_us_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.arc_user_us_id_seq;
       public          postgres    false    228                    0    0    arc_user_us_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.arc_user_us_id_seq OWNED BY public.arc_user.us_id;
          public          postgres    false    227         �            1259    16419 	   arc_visit    TABLE     �   CREATE TABLE public.arc_visit (
    vi_id integer NOT NULL,
    vi_condition character varying(255) NOT NULL,
    vi_date date NOT NULL,
    vi_condition_details text
);
    DROP TABLE public.arc_visit;
       public         heap    postgres    false         �            1259    16444    food_fo_id_seq    SEQUENCE     �   CREATE SEQUENCE public.food_fo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.food_fo_id_seq;
       public          postgres    false    222                    0    0    food_fo_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.food_fo_id_seq OWNED BY public.arc_food.fo_id;
          public          postgres    false    221         �            1259    16400    habitat_id_seq    SEQUENCE     �   CREATE SEQUENCE public.habitat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.habitat_id_seq;
       public          postgres    false    216                    0    0    habitat_id_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.habitat_id_seq OWNED BY public.arc_habitat.ha_id;
          public          postgres    false    215         �            1259    16418    visit_vi_id_seq    SEQUENCE     �   CREATE SEQUENCE public.visit_vi_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.visit_vi_id_seq;
       public          postgres    false    220                    0    0    visit_vi_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.visit_vi_id_seq OWNED BY public.arc_visit.vi_id;
          public          postgres    false    219         H           2604    16415    arc_animal an_id    DEFAULT     p   ALTER TABLE ONLY public.arc_animal ALTER COLUMN an_id SET DEFAULT nextval('public.animal_an_id_seq'::regclass);
 ?   ALTER TABLE public.arc_animal ALTER COLUMN an_id DROP DEFAULT;
       public          postgres    false    217    218    218         N           2604    16514    arc_animal_visit av_id    DEFAULT     �   ALTER TABLE ONLY public.arc_animal_visit ALTER COLUMN av_id SET DEFAULT nextval('public.arc_animal_visit_av_id_seq'::regclass);
 E   ALTER TABLE public.arc_animal_visit ALTER COLUMN av_id DROP DEFAULT;
       public          postgres    false    230    229    230         P           2604    16548    arc_feeding fe_id    DEFAULT     v   ALTER TABLE ONLY public.arc_feeding ALTER COLUMN fe_id SET DEFAULT nextval('public.arc_feeding_fe_id_seq'::regclass);
 @   ALTER TABLE public.arc_feeding ALTER COLUMN fe_id DROP DEFAULT;
       public          postgres    false    233    234    234         J           2604    16448    arc_food fo_id    DEFAULT     l   ALTER TABLE ONLY public.arc_food ALTER COLUMN fo_id SET DEFAULT nextval('public.food_fo_id_seq'::regclass);
 =   ALTER TABLE public.arc_food ALTER COLUMN fo_id DROP DEFAULT;
       public          postgres    false    221    222    222         G           2604    16404    arc_habitat ha_id    DEFAULT     o   ALTER TABLE ONLY public.arc_habitat ALTER COLUMN ha_id SET DEFAULT nextval('public.habitat_id_seq'::regclass);
 @   ALTER TABLE public.arc_habitat ALTER COLUMN ha_id DROP DEFAULT;
       public          postgres    false    215    216    216         O           2604    16531    arc_instruction in_id    DEFAULT     ~   ALTER TABLE ONLY public.arc_instruction ALTER COLUMN in_id SET DEFAULT nextval('public.arc_instruction_in_id_seq'::regclass);
 D   ALTER TABLE public.arc_instruction ALTER COLUMN in_id DROP DEFAULT;
       public          postgres    false    231    232    232         L           2604    16498    arc_review re_id    DEFAULT     s   ALTER TABLE ONLY public.arc_review ALTER COLUMN re_id SET DEFAULT nextval('public.arc_eview_re_id_seq'::regclass);
 ?   ALTER TABLE public.arc_review ALTER COLUMN re_id DROP DEFAULT;
       public          postgres    false    226    225    226         K           2604    16489    arc_service se_id    DEFAULT     v   ALTER TABLE ONLY public.arc_service ALTER COLUMN se_id SET DEFAULT nextval('public.arc_service_se_id_seq'::regclass);
 @   ALTER TABLE public.arc_service ALTER COLUMN se_id DROP DEFAULT;
       public          postgres    false    223    224    224         M           2604    16507    arc_user us_id    DEFAULT     p   ALTER TABLE ONLY public.arc_user ALTER COLUMN us_id SET DEFAULT nextval('public.arc_user_us_id_seq'::regclass);
 =   ALTER TABLE public.arc_user ALTER COLUMN us_id DROP DEFAULT;
       public          postgres    false    227    228    228         I           2604    16422    arc_visit vi_id    DEFAULT     n   ALTER TABLE ONLY public.arc_visit ALTER COLUMN vi_id SET DEFAULT nextval('public.visit_vi_id_seq'::regclass);
 >   ALTER TABLE public.arc_visit ALTER COLUMN vi_id DROP DEFAULT;
       public          postgres    false    219    220    220         �          0    16412 
   arc_animal 
   TABLE DATA           K   COPY public.arc_animal (an_id, an_name, an_species, an_images) FROM stdin;
    public          postgres    false    218       4861.dat 	          0    16511    arc_animal_visit 
   TABLE DATA           L   COPY public.arc_animal_visit (av_id, av_animal_id, av_visit_id) FROM stdin;
    public          postgres    false    230       4873.dat           0    16545    arc_feeding 
   TABLE DATA           e   COPY public.arc_feeding (fe_id, fe_food_id, fe_animal_id, fe_quantity, fe_date, fe_time) FROM stdin;
    public          postgres    false    234       4877.dat           0    16445    arc_food 
   TABLE DATA           2   COPY public.arc_food (fo_id, fo_type) FROM stdin;
    public          postgres    false    222       4865.dat �          0    16401    arc_habitat 
   TABLE DATA           \   COPY public.arc_habitat (ha_id, ha_name, ha_description, ha_images, ha_comment) FROM stdin;
    public          postgres    false    216       4859.dat           0    16528    arc_instruction 
   TABLE DATA           W   COPY public.arc_instruction (in_id, in_food_id, in_animal_id, in_quantity) FROM stdin;
    public          postgres    false    232       4875.dat           0    16495 
   arc_review 
   TABLE DATA           N   COPY public.arc_review (re_id, re_pseudo, re_review, re_approved) FROM stdin;
    public          postgres    false    226       4869.dat           0    16486    arc_service 
   TABLE DATA           P   COPY public.arc_service (se_id, se_name, se_description, se_images) FROM stdin;
    public          postgres    false    224       4867.dat           0    16504    arc_user 
   TABLE DATA           I   COPY public.arc_user (us_id, us_email, us_password, us_role) FROM stdin;
    public          postgres    false    228       4871.dat �          0    16419 	   arc_visit 
   TABLE DATA           W   COPY public.arc_visit (vi_id, vi_condition, vi_date, vi_condition_details) FROM stdin;
    public          postgres    false    220       4863.dat            0    0    animal_an_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.animal_an_id_seq', 1, false);
          public          postgres    false    217                     0    0    arc_animal_visit_av_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.arc_animal_visit_av_id_seq', 1, false);
          public          postgres    false    229         !           0    0    arc_eview_re_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.arc_eview_re_id_seq', 3, true);
          public          postgres    false    225         "           0    0    arc_feeding_fe_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.arc_feeding_fe_id_seq', 1, false);
          public          postgres    false    233         #           0    0    arc_instruction_in_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.arc_instruction_in_id_seq', 1, false);
          public          postgres    false    231         $           0    0    arc_service_se_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.arc_service_se_id_seq', 3, true);
          public          postgres    false    223         %           0    0    arc_user_us_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.arc_user_us_id_seq', 1, false);
          public          postgres    false    227         &           0    0    food_fo_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.food_fo_id_seq', 1, false);
          public          postgres    false    221         '           0    0    habitat_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.habitat_id_seq', 3, true);
          public          postgres    false    215         (           0    0    visit_vi_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.visit_vi_id_seq', 1, false);
          public          postgres    false    219         T           2606    16417    arc_animal animal_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT animal_pkey PRIMARY KEY (an_id);
 @   ALTER TABLE ONLY public.arc_animal DROP CONSTRAINT animal_pkey;
       public            postgres    false    218         `           2606    16516 &   arc_animal_visit arc_animal_visit_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_pkey PRIMARY KEY (av_id);
 P   ALTER TABLE ONLY public.arc_animal_visit DROP CONSTRAINT arc_animal_visit_pkey;
       public            postgres    false    230         \           2606    16502    arc_review arc_eview_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.arc_review
    ADD CONSTRAINT arc_eview_pkey PRIMARY KEY (re_id);
 C   ALTER TABLE ONLY public.arc_review DROP CONSTRAINT arc_eview_pkey;
       public            postgres    false    226         d           2606    16550    arc_feeding arc_feeding_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_pkey PRIMARY KEY (fe_id);
 F   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_pkey;
       public            postgres    false    234         b           2606    16533 $   arc_instruction arc_instruction_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_pkey PRIMARY KEY (in_id);
 N   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_pkey;
       public            postgres    false    232         Z           2606    16493    arc_service arc_service_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.arc_service
    ADD CONSTRAINT arc_service_pkey PRIMARY KEY (se_id);
 F   ALTER TABLE ONLY public.arc_service DROP CONSTRAINT arc_service_pkey;
       public            postgres    false    224         ^           2606    16509    arc_user arc_user_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.arc_user
    ADD CONSTRAINT arc_user_pkey PRIMARY KEY (us_id);
 @   ALTER TABLE ONLY public.arc_user DROP CONSTRAINT arc_user_pkey;
       public            postgres    false    228         X           2606    16450    arc_food food_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.arc_food
    ADD CONSTRAINT food_pkey PRIMARY KEY (fo_id);
 <   ALTER TABLE ONLY public.arc_food DROP CONSTRAINT food_pkey;
       public            postgres    false    222         R           2606    16408    arc_habitat habitat_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.arc_habitat
    ADD CONSTRAINT habitat_pkey PRIMARY KEY (ha_id);
 B   ALTER TABLE ONLY public.arc_habitat DROP CONSTRAINT habitat_pkey;
       public            postgres    false    216         V           2606    16426    arc_visit visit_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT visit_pkey PRIMARY KEY (vi_id);
 >   ALTER TABLE ONLY public.arc_visit DROP CONSTRAINT visit_pkey;
       public            postgres    false    220         e           2606    16517 3   arc_animal_visit arc_animal_visit_av_animal_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_av_animal_id_fkey FOREIGN KEY (av_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 ]   ALTER TABLE ONLY public.arc_animal_visit DROP CONSTRAINT arc_animal_visit_av_animal_id_fkey;
       public          postgres    false    4692    218    230         f           2606    16522 2   arc_animal_visit arc_animal_visit_av_visit_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_av_visit_id_fkey FOREIGN KEY (av_visit_id) REFERENCES public.arc_visit(vi_id) ON DELETE CASCADE;
 \   ALTER TABLE ONLY public.arc_animal_visit DROP CONSTRAINT arc_animal_visit_av_visit_id_fkey;
       public          postgres    false    4694    230    220         i           2606    16556 )   arc_feeding arc_feeding_fe_animal_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_animal_id_fkey FOREIGN KEY (fe_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 S   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_fe_animal_id_fkey;
       public          postgres    false    4692    218    234         j           2606    16551 '   arc_feeding arc_feeding_fe_food_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_food_id_fkey FOREIGN KEY (fe_food_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_fe_food_id_fkey;
       public          postgres    false    222    234    4696         g           2606    16539 1   arc_instruction arc_instruction_in_animal_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_animal_id_fkey FOREIGN KEY (in_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 [   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_in_animal_id_fkey;
       public          postgres    false    218    4692    232         h           2606    16534 /   arc_instruction arc_instruction_in_food_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_food_id_fkey FOREIGN KEY (in_food_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;
 Y   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_in_food_id_fkey;
       public          postgres    false    232    222    4696                                                                                                                                                                                                                                                                                                                                                                                                                                                         4861.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014242 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4873.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4877.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4865.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014246 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4859.dat                                                                                            0000600 0004000 0002000 00000004233 14632521101 0014260 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	jungle	L'espace jungle de notre zoo est une immersion totale dans l'exubérante forêt tropicale. Dès votre entrée, une végétation luxuriante vous entoure, avec des lianes pendantes, des fougères géantes et des arbres imposants abritant une multitude de créatures exotiques. Vous pouvez apercevoir des singes espiègles se balancer de branche en branche, tandis que des perroquets colorés survolent les sentiers. Des panneaux éducatifs jalonnent le parcours, offrant des informations fascinantes sur les espèces végétales et animales de la jungle. L'humidité ambiante et les sons envoûtants de la faune créent une expérience sensorielle unique, transportant les visiteurs au cœur de la nature sauvage.	jungle.webp	\N
2	savane	L'espace savane de notre zoo vous transporte au cœur des vastes plaines africaines. Des troupeaux de zèbres et d'antilopes se déplacent librement, tandis que les girafes graciles s'élèvent au-dessus des arbres pour brouter les feuilles. Plus loin, vous pourrez observer des éléphants se rafraîchir dans une mare, et peut-être apercevoir un lion se prélassant à l'ombre. Des points d'observation stratégiques permettent une vue imprenable sur ces animaux emblématiques, accompagnés de panneaux explicatifs sur leur habitat et leur comportement. L'expérience est enrichie par des sons réalistes de la savane, créant une immersion totale dans cet écosystème fascinant.	savane.webp	\N
3	marais	L'espace marais de notre zoo vous plonge dans l'atmosphère des zones humides. En avançant sur des passerelles surélevées, vous pourrez admirer des étendues d'eau bordées de joncs et de nénuphars. Des tortues paressent sur des troncs d'arbres émergés, tandis que des alligators se dissimulent à peine sous la surface calme de l'eau. Des oiseaux, comme les hérons et les ibis, picorent dans les marécages à la recherche de leur prochain repas. Vous découvrirez également une variété de poissons et d'amphibiens. Des panneaux informatifs racontent l'importance écologique des marais et la diversité des espèces qui y vivent. Vous apprécierez cette promenade relaxante au cœur de ce biotope fascinant et vital.	marais.webp	\N
\.


                                                                                                                                                                                                                                                                                                                                                                     4875.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4869.dat                                                                                            0000600 0004000 0002000 00000000515 14632521101 0014260 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Marie63	Nous avons passé une superbe journée à Arcadia. C’est un plaisir de voir que les animaux sont si bien traités :)	t
2	Paul.legarec	Bravo pour ce joli parc, toute la famille a adoré !	t
3	Julie87	Quel plaisir de voir un parc où les animaux sont si bien traités ! Nous avons aimé les explications des guides.	t
\.


                                                                                                                                                                                   4867.dat                                                                                            0000600 0004000 0002000 00000003722 14632521101 0014261 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	restauration	Notre zoo propose une variété de services de restauration pour satisfaire toutes vos envies culinaires pendant votre visite. Vous trouverez plusieurs snacks disséminés dans le parc, offrant des en-cas rapides comme des sandwiches, des fruits frais et des boissons rafraîchissantes. Pour une pause gourmande, arrêtez-vous à l'un de nos stands de glace, où des délices glacés aux saveurs variées raviront petits et grands. Pour un repas plus complet, notre restaurant vous accueille dans un cadre convivial, avec un menu diversifié comprenant des plats chauds, des salades, et des options végétariennes. Des aires de pique-nique ont été également été aménagées dans chaque espace.	restaurant.webp
2	visite guidée des habitats	Profitez de visites guidées gratuites des habitats. Elles vous permettront de découvrir nos animaux de manière enrichissante et éducative. Chaque visite est une occasion d'apprendre des anecdotes fascinantes sur les espèces que vous rencontrez, leurs comportements et leurs habitats naturels. Les guides sont également disponibles pour répondre à vos questions et partager des faits surprenants. Ces visites guidées sont idéales pour tous les âges, offrant une expérience immersive et interactive qui enrichira votre visite et vous laissera avec des souvenirs inoubliables.	visite_guidee.webp
3	petit train	Embarquez à bord de notre petit train, qui vous conduira à travers les différentes zones du parc, telles que la jungle, la savane et les marais. Conçu pour toute la famille, ce moyen de transport pratique permet de profiter d'une vue panoramique sur les habitats et les animaux, tout en se relaxant. Le petit train est commenté, offrant des informations intéressantes et des anecdotes amusantes sur les espèces que vous croisez. C'est l'occasion idéale pour découvrir le zoo sans fatigue. Rejoignez-nous pour une expérience mémorable et conviviale, qui plaira aux petits comme aux grands.	petit_train.webp
\.


                                              4871.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014243 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           4863.dat                                                                                            0000600 0004000 0002000 00000000005 14632521101 0014244 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           restore.sql                                                                                         0000600 0004000 0002000 00000044770 14632521101 0015373 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

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

DROP DATABASE arcadiadb;
--
-- Name: arcadiadb; Type: DATABASE; Schema: -; Owner: user
--

CREATE DATABASE arcadiadb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';


ALTER DATABASE arcadiadb OWNER TO "user";

\connect arcadiadb

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
-- Name: arc_animal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_animal (
    an_id integer NOT NULL,
    an_name character varying(60) NOT NULL,
    an_species character varying(60),
    an_images character varying(255)
);


ALTER TABLE public.arc_animal OWNER TO postgres;

--
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
-- Name: animal_an_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.animal_an_id_seq OWNED BY public.arc_animal.an_id;


--
-- Name: arc_animal_visit; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_animal_visit (
    av_id integer NOT NULL,
    av_animal_id integer NOT NULL,
    av_visit_id integer NOT NULL
);


ALTER TABLE public.arc_animal_visit OWNER TO postgres;

--
-- Name: arc_animal_visit_av_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.arc_animal_visit_av_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.arc_animal_visit_av_id_seq OWNER TO postgres;

--
-- Name: arc_animal_visit_av_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_animal_visit_av_id_seq OWNED BY public.arc_animal_visit.av_id;


--
-- Name: arc_review; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_review (
    re_id integer NOT NULL,
    re_pseudo character varying(60) NOT NULL,
    re_review text NOT NULL,
    re_approved boolean
);


ALTER TABLE public.arc_review OWNER TO postgres;

--
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
-- Name: arc_eview_re_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_eview_re_id_seq OWNED BY public.arc_review.re_id;


--
-- Name: arc_feeding; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_feeding (
    fe_id integer NOT NULL,
    fe_food_id integer NOT NULL,
    fe_animal_id integer NOT NULL,
    fe_quantity real NOT NULL,
    fe_date date NOT NULL,
    fe_time time without time zone NOT NULL
);


ALTER TABLE public.arc_feeding OWNER TO postgres;

--
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
-- Name: arc_feeding_fe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_feeding_fe_id_seq OWNED BY public.arc_feeding.fe_id;


--
-- Name: arc_food; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_food (
    fo_id integer NOT NULL,
    fo_type character varying(255) NOT NULL
);


ALTER TABLE public.arc_food OWNER TO postgres;

--
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
-- Name: arc_instruction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_instruction (
    in_id integer NOT NULL,
    in_food_id integer NOT NULL,
    in_animal_id integer NOT NULL,
    in_quantity real
);


ALTER TABLE public.arc_instruction OWNER TO postgres;

--
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
-- Name: arc_instruction_in_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_instruction_in_id_seq OWNED BY public.arc_instruction.in_id;


--
-- Name: arc_service; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_service (
    se_id integer NOT NULL,
    se_name character varying(255) NOT NULL,
    se_description text,
    se_images character varying(255)
);


ALTER TABLE public.arc_service OWNER TO postgres;

--
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
-- Name: arc_service_se_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_service_se_id_seq OWNED BY public.arc_service.se_id;


--
-- Name: arc_user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_user (
    us_id integer NOT NULL,
    us_email character varying(60) NOT NULL,
    us_password character varying(255) NOT NULL,
    us_role character varying(60) NOT NULL
);


ALTER TABLE public.arc_user OWNER TO postgres;

--
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
-- Name: arc_user_us_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.arc_user_us_id_seq OWNED BY public.arc_user.us_id;


--
-- Name: arc_visit; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.arc_visit (
    vi_id integer NOT NULL,
    vi_condition character varying(255) NOT NULL,
    vi_date date NOT NULL,
    vi_condition_details text
);


ALTER TABLE public.arc_visit OWNER TO postgres;

--
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
-- Name: food_fo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.food_fo_id_seq OWNED BY public.arc_food.fo_id;


--
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
-- Name: habitat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.habitat_id_seq OWNED BY public.arc_habitat.ha_id;


--
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
-- Name: visit_vi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.visit_vi_id_seq OWNED BY public.arc_visit.vi_id;


--
-- Name: arc_animal an_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal ALTER COLUMN an_id SET DEFAULT nextval('public.animal_an_id_seq'::regclass);


--
-- Name: arc_animal_visit av_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal_visit ALTER COLUMN av_id SET DEFAULT nextval('public.arc_animal_visit_av_id_seq'::regclass);


--
-- Name: arc_feeding fe_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding ALTER COLUMN fe_id SET DEFAULT nextval('public.arc_feeding_fe_id_seq'::regclass);


--
-- Name: arc_food fo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_food ALTER COLUMN fo_id SET DEFAULT nextval('public.food_fo_id_seq'::regclass);


--
-- Name: arc_habitat ha_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_habitat ALTER COLUMN ha_id SET DEFAULT nextval('public.habitat_id_seq'::regclass);


--
-- Name: arc_instruction in_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction ALTER COLUMN in_id SET DEFAULT nextval('public.arc_instruction_in_id_seq'::regclass);


--
-- Name: arc_review re_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_review ALTER COLUMN re_id SET DEFAULT nextval('public.arc_eview_re_id_seq'::regclass);


--
-- Name: arc_service se_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_service ALTER COLUMN se_id SET DEFAULT nextval('public.arc_service_se_id_seq'::regclass);


--
-- Name: arc_user us_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_user ALTER COLUMN us_id SET DEFAULT nextval('public.arc_user_us_id_seq'::regclass);


--
-- Name: arc_visit vi_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_visit ALTER COLUMN vi_id SET DEFAULT nextval('public.visit_vi_id_seq'::regclass);


--
-- Data for Name: arc_animal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_animal (an_id, an_name, an_species, an_images) FROM stdin;
\.
COPY public.arc_animal (an_id, an_name, an_species, an_images) FROM '$$PATH$$/4861.dat';

--
-- Data for Name: arc_animal_visit; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_animal_visit (av_id, av_animal_id, av_visit_id) FROM stdin;
\.
COPY public.arc_animal_visit (av_id, av_animal_id, av_visit_id) FROM '$$PATH$$/4873.dat';

--
-- Data for Name: arc_feeding; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_feeding (fe_id, fe_food_id, fe_animal_id, fe_quantity, fe_date, fe_time) FROM stdin;
\.
COPY public.arc_feeding (fe_id, fe_food_id, fe_animal_id, fe_quantity, fe_date, fe_time) FROM '$$PATH$$/4877.dat';

--
-- Data for Name: arc_food; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_food (fo_id, fo_type) FROM stdin;
\.
COPY public.arc_food (fo_id, fo_type) FROM '$$PATH$$/4865.dat';

--
-- Data for Name: arc_habitat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_habitat (ha_id, ha_name, ha_description, ha_images, ha_comment) FROM stdin;
\.
COPY public.arc_habitat (ha_id, ha_name, ha_description, ha_images, ha_comment) FROM '$$PATH$$/4859.dat';

--
-- Data for Name: arc_instruction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_instruction (in_id, in_food_id, in_animal_id, in_quantity) FROM stdin;
\.
COPY public.arc_instruction (in_id, in_food_id, in_animal_id, in_quantity) FROM '$$PATH$$/4875.dat';

--
-- Data for Name: arc_review; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_review (re_id, re_pseudo, re_review, re_approved) FROM stdin;
\.
COPY public.arc_review (re_id, re_pseudo, re_review, re_approved) FROM '$$PATH$$/4869.dat';

--
-- Data for Name: arc_service; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_service (se_id, se_name, se_description, se_images) FROM stdin;
\.
COPY public.arc_service (se_id, se_name, se_description, se_images) FROM '$$PATH$$/4867.dat';

--
-- Data for Name: arc_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_user (us_id, us_email, us_password, us_role) FROM stdin;
\.
COPY public.arc_user (us_id, us_email, us_password, us_role) FROM '$$PATH$$/4871.dat';

--
-- Data for Name: arc_visit; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.arc_visit (vi_id, vi_condition, vi_date, vi_condition_details) FROM stdin;
\.
COPY public.arc_visit (vi_id, vi_condition, vi_date, vi_condition_details) FROM '$$PATH$$/4863.dat';

--
-- Name: animal_an_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.animal_an_id_seq', 1, false);


--
-- Name: arc_animal_visit_av_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_animal_visit_av_id_seq', 1, false);


--
-- Name: arc_eview_re_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_eview_re_id_seq', 3, true);


--
-- Name: arc_feeding_fe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_feeding_fe_id_seq', 1, false);


--
-- Name: arc_instruction_in_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_instruction_in_id_seq', 1, false);


--
-- Name: arc_service_se_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_service_se_id_seq', 3, true);


--
-- Name: arc_user_us_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.arc_user_us_id_seq', 1, false);


--
-- Name: food_fo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.food_fo_id_seq', 1, false);


--
-- Name: habitat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.habitat_id_seq', 3, true);


--
-- Name: visit_vi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visit_vi_id_seq', 1, false);


--
-- Name: arc_animal animal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT animal_pkey PRIMARY KEY (an_id);


--
-- Name: arc_animal_visit arc_animal_visit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_pkey PRIMARY KEY (av_id);


--
-- Name: arc_review arc_eview_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_review
    ADD CONSTRAINT arc_eview_pkey PRIMARY KEY (re_id);


--
-- Name: arc_feeding arc_feeding_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_pkey PRIMARY KEY (fe_id);


--
-- Name: arc_instruction arc_instruction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_pkey PRIMARY KEY (in_id);


--
-- Name: arc_service arc_service_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_service
    ADD CONSTRAINT arc_service_pkey PRIMARY KEY (se_id);


--
-- Name: arc_user arc_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_user
    ADD CONSTRAINT arc_user_pkey PRIMARY KEY (us_id);


--
-- Name: arc_food food_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_food
    ADD CONSTRAINT food_pkey PRIMARY KEY (fo_id);


--
-- Name: arc_habitat habitat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_habitat
    ADD CONSTRAINT habitat_pkey PRIMARY KEY (ha_id);


--
-- Name: arc_visit visit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT visit_pkey PRIMARY KEY (vi_id);


--
-- Name: arc_animal_visit arc_animal_visit_av_animal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_av_animal_id_fkey FOREIGN KEY (av_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- Name: arc_animal_visit arc_animal_visit_av_visit_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_animal_visit
    ADD CONSTRAINT arc_animal_visit_av_visit_id_fkey FOREIGN KEY (av_visit_id) REFERENCES public.arc_visit(vi_id) ON DELETE CASCADE;


--
-- Name: arc_feeding arc_feeding_fe_animal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_animal_id_fkey FOREIGN KEY (fe_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- Name: arc_feeding arc_feeding_fe_food_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_food_id_fkey FOREIGN KEY (fe_food_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;


--
-- Name: arc_instruction arc_instruction_in_animal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_animal_id_fkey FOREIGN KEY (in_animal_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;


--
-- Name: arc_instruction arc_instruction_in_food_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_food_id_fkey FOREIGN KEY (in_food_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;


--
-- Name: DATABASE arcadiadb; Type: ACL; Schema: -; Owner: user
--

REVOKE ALL ON DATABASE arcadiadb FROM "user";
GRANT ALL ON DATABASE arcadiadb TO "user" WITH GRANT OPTION;


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        