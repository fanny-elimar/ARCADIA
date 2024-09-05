PGDMP                      |        	   arcadiadb    16.0    16.0 ]    $           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            %           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            &           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            '           1262    16399 	   arcadiadb    DATABASE     |   CREATE DATABASE arcadiadb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
    DROP DATABASE arcadiadb;
                user    false            (           0    0    DATABASE arcadiadb    ACL     k   REVOKE ALL ON DATABASE arcadiadb FROM "user";
GRANT ALL ON DATABASE arcadiadb TO "user" WITH GRANT OPTION;
                   user    false    4903            �            1259    16412 
   arc_animal    TABLE       CREATE TABLE public.arc_animal (
    an_id integer NOT NULL,
    an_name character varying(60) NOT NULL,
    an_species character varying(60),
    an_images character varying(255),
    an_ha_id integer NOT NULL,
    an_extra_images text,
    an_en_name character varying(60)
);
    DROP TABLE public.arc_animal;
       public         heap    postgres    false            �            1259    16411    animal_an_id_seq    SEQUENCE     �   CREATE SEQUENCE public.animal_an_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.animal_an_id_seq;
       public          postgres    false    218            )           0    0    animal_an_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.animal_an_id_seq OWNED BY public.arc_animal.an_id;
          public          postgres    false    217            �            1259    16723    arc_enclosure    TABLE     g   CREATE TABLE public.arc_enclosure (
    en_name character varying(60) NOT NULL,
    en_comment text
);
 !   DROP TABLE public.arc_enclosure;
       public         heap    user    false            �            1259    16495 
   arc_review    TABLE     �   CREATE TABLE public.arc_review (
    re_id integer NOT NULL,
    re_pseudo character varying(60) NOT NULL,
    re_review text NOT NULL,
    re_approved boolean,
    re_date date DEFAULT CURRENT_DATE NOT NULL
);
    DROP TABLE public.arc_review;
       public         heap    postgres    false            �            1259    16494    arc_eview_re_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_eview_re_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.arc_eview_re_id_seq;
       public          postgres    false    226            *           0    0    arc_eview_re_id_seq    SEQUENCE OWNED BY     L   ALTER SEQUENCE public.arc_eview_re_id_seq OWNED BY public.arc_review.re_id;
          public          postgres    false    225            �            1259    16545    arc_feeding    TABLE     �   CREATE TABLE public.arc_feeding (
    fe_id integer NOT NULL,
    fe_fo_id integer NOT NULL,
    fe_an_id integer NOT NULL,
    fe_quantity real NOT NULL,
    fe_date date NOT NULL,
    fe_time time without time zone NOT NULL
);
    DROP TABLE public.arc_feeding;
       public         heap    postgres    false            �            1259    16544    arc_feeding_fe_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_feeding_fe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.arc_feeding_fe_id_seq;
       public          postgres    false    232            +           0    0    arc_feeding_fe_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.arc_feeding_fe_id_seq OWNED BY public.arc_feeding.fe_id;
          public          postgres    false    231            �            1259    16445    arc_food    TABLE     j   CREATE TABLE public.arc_food (
    fo_id integer NOT NULL,
    fo_type character varying(255) NOT NULL
);
    DROP TABLE public.arc_food;
       public         heap    postgres    false            �            1259    16401    arc_habitat    TABLE     �   CREATE TABLE public.arc_habitat (
    ha_id integer NOT NULL,
    ha_name character varying(60) NOT NULL,
    ha_description text,
    ha_images character varying(255),
    ha_comment text
);
    DROP TABLE public.arc_habitat;
       public         heap    postgres    false            �            1259    16736    arc_horaire    TABLE       CREATE TABLE public.arc_horaire (
    ho_id integer NOT NULL,
    ho_periode_start date NOT NULL,
    ho_periode_end date NOT NULL,
    ho_days character varying(255) NOT NULL,
    ho_time_start time without time zone NOT NULL,
    ho_time_end time without time zone NOT NULL
);
    DROP TABLE public.arc_horaire;
       public         heap    user    false            �            1259    16735    arc_horaires_ho_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_horaires_ho_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.arc_horaires_ho_id_seq;
       public          user    false    237            ,           0    0    arc_horaires_ho_id_seq    SEQUENCE OWNED BY     P   ALTER SEQUENCE public.arc_horaires_ho_id_seq OWNED BY public.arc_horaire.ho_id;
          public          user    false    236            �            1259    16703    arc_image_animal    TABLE     �   CREATE TABLE public.arc_image_animal (
    im_an_filename character varying(255) NOT NULL,
    im_an_an_id integer NOT NULL,
    im_an_id integer NOT NULL
);
 $   DROP TABLE public.arc_image_animal;
       public         heap    user    false            �            1259    16715    arc_image_animal_im_an_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_image_animal_im_an_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.arc_image_animal_im_an_id_seq;
       public          user    false    233            -           0    0    arc_image_animal_im_an_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.arc_image_animal_im_an_id_seq OWNED BY public.arc_image_animal.im_an_id;
          public          user    false    234            �            1259    16528    arc_instruction    TABLE     �   CREATE TABLE public.arc_instruction (
    in_id integer NOT NULL,
    in_fo_id integer NOT NULL,
    in_an_id integer NOT NULL,
    in_quantity real
);
 #   DROP TABLE public.arc_instruction;
       public         heap    postgres    false            �            1259    16527    arc_instruction_in_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_instruction_in_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.arc_instruction_in_id_seq;
       public          postgres    false    230            .           0    0    arc_instruction_in_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.arc_instruction_in_id_seq OWNED BY public.arc_instruction.in_id;
          public          postgres    false    229            �            1259    16486    arc_service    TABLE     �   CREATE TABLE public.arc_service (
    se_id integer NOT NULL,
    se_name character varying(255) NOT NULL,
    se_description text,
    se_images character varying(255),
    se_info text
);
    DROP TABLE public.arc_service;
       public         heap    postgres    false            �            1259    16485    arc_service_se_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_service_se_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.arc_service_se_id_seq;
       public          postgres    false    224            /           0    0    arc_service_se_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.arc_service_se_id_seq OWNED BY public.arc_service.se_id;
          public          postgres    false    223            �            1259    16504    arc_user    TABLE     �   CREATE TABLE public.arc_user (
    us_id integer NOT NULL,
    us_email character varying(60) NOT NULL,
    us_password character varying(255) NOT NULL,
    us_role character varying(60) NOT NULL,
    us_fname character varying(60)
);
    DROP TABLE public.arc_user;
       public         heap    postgres    false            �            1259    16503    arc_user_us_id_seq    SEQUENCE     �   CREATE SEQUENCE public.arc_user_us_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.arc_user_us_id_seq;
       public          postgres    false    228            0           0    0    arc_user_us_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.arc_user_us_id_seq OWNED BY public.arc_user.us_id;
          public          postgres    false    227            �            1259    16419 	   arc_visit    TABLE     �   CREATE TABLE public.arc_visit (
    vi_id integer NOT NULL,
    vi_condition character varying(255) NOT NULL,
    vi_date date NOT NULL,
    vi_condition_details text,
    vi_an_id integer NOT NULL
);
    DROP TABLE public.arc_visit;
       public         heap    postgres    false            �            1259    16444    food_fo_id_seq    SEQUENCE     �   CREATE SEQUENCE public.food_fo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.food_fo_id_seq;
       public          postgres    false    222            1           0    0    food_fo_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.food_fo_id_seq OWNED BY public.arc_food.fo_id;
          public          postgres    false    221            �            1259    16400    habitat_id_seq    SEQUENCE     �   CREATE SEQUENCE public.habitat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.habitat_id_seq;
       public          postgres    false    216            2           0    0    habitat_id_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.habitat_id_seq OWNED BY public.arc_habitat.ha_id;
          public          postgres    false    215            �            1259    16418    visit_vi_id_seq    SEQUENCE     �   CREATE SEQUENCE public.visit_vi_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.visit_vi_id_seq;
       public          postgres    false    220            3           0    0    visit_vi_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.visit_vi_id_seq OWNED BY public.arc_visit.vi_id;
          public          postgres    false    219            Q           2604    16415    arc_animal an_id    DEFAULT     p   ALTER TABLE ONLY public.arc_animal ALTER COLUMN an_id SET DEFAULT nextval('public.animal_an_id_seq'::regclass);
 ?   ALTER TABLE public.arc_animal ALTER COLUMN an_id DROP DEFAULT;
       public          postgres    false    218    217    218            Y           2604    16548    arc_feeding fe_id    DEFAULT     v   ALTER TABLE ONLY public.arc_feeding ALTER COLUMN fe_id SET DEFAULT nextval('public.arc_feeding_fe_id_seq'::regclass);
 @   ALTER TABLE public.arc_feeding ALTER COLUMN fe_id DROP DEFAULT;
       public          postgres    false    231    232    232            S           2604    16448    arc_food fo_id    DEFAULT     l   ALTER TABLE ONLY public.arc_food ALTER COLUMN fo_id SET DEFAULT nextval('public.food_fo_id_seq'::regclass);
 =   ALTER TABLE public.arc_food ALTER COLUMN fo_id DROP DEFAULT;
       public          postgres    false    222    221    222            P           2604    16404    arc_habitat ha_id    DEFAULT     o   ALTER TABLE ONLY public.arc_habitat ALTER COLUMN ha_id SET DEFAULT nextval('public.habitat_id_seq'::regclass);
 @   ALTER TABLE public.arc_habitat ALTER COLUMN ha_id DROP DEFAULT;
       public          postgres    false    216    215    216            [           2604    16739    arc_horaire ho_id    DEFAULT     w   ALTER TABLE ONLY public.arc_horaire ALTER COLUMN ho_id SET DEFAULT nextval('public.arc_horaires_ho_id_seq'::regclass);
 @   ALTER TABLE public.arc_horaire ALTER COLUMN ho_id DROP DEFAULT;
       public          user    false    237    236    237            Z           2604    16716    arc_image_animal im_an_id    DEFAULT     �   ALTER TABLE ONLY public.arc_image_animal ALTER COLUMN im_an_id SET DEFAULT nextval('public.arc_image_animal_im_an_id_seq'::regclass);
 H   ALTER TABLE public.arc_image_animal ALTER COLUMN im_an_id DROP DEFAULT;
       public          user    false    234    233            X           2604    16531    arc_instruction in_id    DEFAULT     ~   ALTER TABLE ONLY public.arc_instruction ALTER COLUMN in_id SET DEFAULT nextval('public.arc_instruction_in_id_seq'::regclass);
 D   ALTER TABLE public.arc_instruction ALTER COLUMN in_id DROP DEFAULT;
       public          postgres    false    229    230    230            U           2604    16498    arc_review re_id    DEFAULT     s   ALTER TABLE ONLY public.arc_review ALTER COLUMN re_id SET DEFAULT nextval('public.arc_eview_re_id_seq'::regclass);
 ?   ALTER TABLE public.arc_review ALTER COLUMN re_id DROP DEFAULT;
       public          postgres    false    225    226    226            T           2604    16489    arc_service se_id    DEFAULT     v   ALTER TABLE ONLY public.arc_service ALTER COLUMN se_id SET DEFAULT nextval('public.arc_service_se_id_seq'::regclass);
 @   ALTER TABLE public.arc_service ALTER COLUMN se_id DROP DEFAULT;
       public          postgres    false    223    224    224            W           2604    16507    arc_user us_id    DEFAULT     p   ALTER TABLE ONLY public.arc_user ALTER COLUMN us_id SET DEFAULT nextval('public.arc_user_us_id_seq'::regclass);
 =   ALTER TABLE public.arc_user ALTER COLUMN us_id DROP DEFAULT;
       public          postgres    false    228    227    228            R           2604    16422    arc_visit vi_id    DEFAULT     n   ALTER TABLE ONLY public.arc_visit ALTER COLUMN vi_id SET DEFAULT nextval('public.visit_vi_id_seq'::regclass);
 >   ALTER TABLE public.arc_visit ALTER COLUMN vi_id DROP DEFAULT;
       public          postgres    false    220    219    220                      0    16412 
   arc_animal 
   TABLE DATA           r   COPY public.arc_animal (an_id, an_name, an_species, an_images, an_ha_id, an_extra_images, an_en_name) FROM stdin;
    public          postgres    false    218   �l                 0    16723    arc_enclosure 
   TABLE DATA           <   COPY public.arc_enclosure (en_name, en_comment) FROM stdin;
    public          user    false    235   o                 0    16545    arc_feeding 
   TABLE DATA           _   COPY public.arc_feeding (fe_id, fe_fo_id, fe_an_id, fe_quantity, fe_date, fe_time) FROM stdin;
    public          postgres    false    232   Yo                 0    16445    arc_food 
   TABLE DATA           2   COPY public.arc_food (fo_id, fo_type) FROM stdin;
    public          postgres    false    222   �o                 0    16401    arc_habitat 
   TABLE DATA           \   COPY public.arc_habitat (ha_id, ha_name, ha_description, ha_images, ha_comment) FROM stdin;
    public          postgres    false    216   Lp       !          0    16736    arc_horaire 
   TABLE DATA           s   COPY public.arc_horaire (ho_id, ho_periode_start, ho_periode_end, ho_days, ho_time_start, ho_time_end) FROM stdin;
    public          user    false    237   �t                 0    16703    arc_image_animal 
   TABLE DATA           Q   COPY public.arc_image_animal (im_an_filename, im_an_an_id, im_an_id) FROM stdin;
    public          user    false    233   Ru                 0    16528    arc_instruction 
   TABLE DATA           Q   COPY public.arc_instruction (in_id, in_fo_id, in_an_id, in_quantity) FROM stdin;
    public          postgres    false    230   �u                 0    16495 
   arc_review 
   TABLE DATA           W   COPY public.arc_review (re_id, re_pseudo, re_review, re_approved, re_date) FROM stdin;
    public          postgres    false    226   6v                 0    16486    arc_service 
   TABLE DATA           Y   COPY public.arc_service (se_id, se_name, se_description, se_images, se_info) FROM stdin;
    public          postgres    false    224   �w                 0    16504    arc_user 
   TABLE DATA           S   COPY public.arc_user (us_id, us_email, us_password, us_role, us_fname) FROM stdin;
    public          postgres    false    228   �|                 0    16419 	   arc_visit 
   TABLE DATA           a   COPY public.arc_visit (vi_id, vi_condition, vi_date, vi_condition_details, vi_an_id) FROM stdin;
    public          postgres    false    220   �       4           0    0    animal_an_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.animal_an_id_seq', 38, true);
          public          postgres    false    217            5           0    0    arc_eview_re_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.arc_eview_re_id_seq', 375, true);
          public          postgres    false    225            6           0    0    arc_feeding_fe_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.arc_feeding_fe_id_seq', 11, true);
          public          postgres    false    231            7           0    0    arc_horaires_ho_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.arc_horaires_ho_id_seq', 5, true);
          public          user    false    236            8           0    0    arc_image_animal_im_an_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.arc_image_animal_im_an_id_seq', 27, true);
          public          user    false    234            9           0    0    arc_instruction_in_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.arc_instruction_in_id_seq', 28, true);
          public          postgres    false    229            :           0    0    arc_service_se_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.arc_service_se_id_seq', 17, true);
          public          postgres    false    223            ;           0    0    arc_user_us_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.arc_user_us_id_seq', 24, true);
          public          postgres    false    227            <           0    0    food_fo_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.food_fo_id_seq', 10, true);
          public          postgres    false    221            =           0    0    habitat_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.habitat_id_seq', 5, true);
          public          postgres    false    215            >           0    0    visit_vi_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.visit_vi_id_seq', 34, true);
          public          postgres    false    219            _           2606    16417    arc_animal animal_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT animal_pkey PRIMARY KEY (an_id);
 @   ALTER TABLE ONLY public.arc_animal DROP CONSTRAINT animal_pkey;
       public            postgres    false    218            q           2606    16729 !   arc_enclosure arc_enclosures_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.arc_enclosure
    ADD CONSTRAINT arc_enclosures_pkey PRIMARY KEY (en_name);
 K   ALTER TABLE ONLY public.arc_enclosure DROP CONSTRAINT arc_enclosures_pkey;
       public            user    false    235            g           2606    16502    arc_review arc_eview_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.arc_review
    ADD CONSTRAINT arc_eview_pkey PRIMARY KEY (re_id);
 C   ALTER TABLE ONLY public.arc_review DROP CONSTRAINT arc_eview_pkey;
       public            postgres    false    226            m           2606    16550    arc_feeding arc_feeding_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_pkey PRIMARY KEY (fe_id);
 F   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_pkey;
       public            postgres    false    232            s           2606    16741    arc_horaire arc_horaires_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.arc_horaire
    ADD CONSTRAINT arc_horaires_pkey PRIMARY KEY (ho_id);
 G   ALTER TABLE ONLY public.arc_horaire DROP CONSTRAINT arc_horaires_pkey;
       public            user    false    237            o           2606    16718 &   arc_image_animal arc_image_animal_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.arc_image_animal
    ADD CONSTRAINT arc_image_animal_pkey PRIMARY KEY (im_an_id);
 P   ALTER TABLE ONLY public.arc_image_animal DROP CONSTRAINT arc_image_animal_pkey;
       public            user    false    233            k           2606    16533 $   arc_instruction arc_instruction_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_pkey PRIMARY KEY (in_id);
 N   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_pkey;
       public            postgres    false    230            e           2606    16493    arc_service arc_service_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.arc_service
    ADD CONSTRAINT arc_service_pkey PRIMARY KEY (se_id);
 F   ALTER TABLE ONLY public.arc_service DROP CONSTRAINT arc_service_pkey;
       public            postgres    false    224            i           2606    16509    arc_user arc_user_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.arc_user
    ADD CONSTRAINT arc_user_pkey PRIMARY KEY (us_id);
 @   ALTER TABLE ONLY public.arc_user DROP CONSTRAINT arc_user_pkey;
       public            postgres    false    228            c           2606    16450    arc_food food_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.arc_food
    ADD CONSTRAINT food_pkey PRIMARY KEY (fo_id);
 <   ALTER TABLE ONLY public.arc_food DROP CONSTRAINT food_pkey;
       public            postgres    false    222            ]           2606    16408    arc_habitat habitat_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.arc_habitat
    ADD CONSTRAINT habitat_pkey PRIMARY KEY (ha_id);
 B   ALTER TABLE ONLY public.arc_habitat DROP CONSTRAINT habitat_pkey;
       public            postgres    false    216            a           2606    16426    arc_visit visit_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT visit_pkey PRIMARY KEY (vi_id);
 >   ALTER TABLE ONLY public.arc_visit DROP CONSTRAINT visit_pkey;
       public            postgres    false    220            t           2606    16672 #   arc_animal arc_animal_an_ha_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT arc_animal_an_ha_id_fkey FOREIGN KEY (an_ha_id) REFERENCES public.arc_habitat(ha_id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.arc_animal DROP CONSTRAINT arc_animal_an_ha_id_fkey;
       public          postgres    false    216    4701    218            y           2606    16556 )   arc_feeding arc_feeding_fe_animal_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_animal_id_fkey FOREIGN KEY (fe_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 S   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_fe_animal_id_fkey;
       public          postgres    false    218    4703    232            z           2606    16551 '   arc_feeding arc_feeding_fe_food_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_feeding
    ADD CONSTRAINT arc_feeding_fe_food_id_fkey FOREIGN KEY (fe_fo_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public.arc_feeding DROP CONSTRAINT arc_feeding_fe_food_id_fkey;
       public          postgres    false    232    222    4707            {           2606    16708 2   arc_image_animal arc_image_animal_im_an_an_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_image_animal
    ADD CONSTRAINT arc_image_animal_im_an_an_id_fkey FOREIGN KEY (im_an_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 \   ALTER TABLE ONLY public.arc_image_animal DROP CONSTRAINT arc_image_animal_im_an_an_id_fkey;
       public          user    false    4703    233    218            w           2606    16539 1   arc_instruction arc_instruction_in_animal_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_animal_id_fkey FOREIGN KEY (in_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 [   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_in_animal_id_fkey;
       public          postgres    false    4703    218    230            x           2606    16534 /   arc_instruction arc_instruction_in_food_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_instruction
    ADD CONSTRAINT arc_instruction_in_food_id_fkey FOREIGN KEY (in_fo_id) REFERENCES public.arc_food(fo_id) ON DELETE RESTRICT;
 Y   ALTER TABLE ONLY public.arc_instruction DROP CONSTRAINT arc_instruction_in_food_id_fkey;
       public          postgres    false    230    4707    222            v           2606    16677 !   arc_visit arc_visit_vi_an_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_visit
    ADD CONSTRAINT arc_visit_vi_an_id_fkey FOREIGN KEY (vi_an_id) REFERENCES public.arc_animal(an_id) ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.arc_visit DROP CONSTRAINT arc_visit_vi_an_id_fkey;
       public          postgres    false    4703    218    220            u           2606    16730    arc_animal enclosure_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.arc_animal
    ADD CONSTRAINT enclosure_fk FOREIGN KEY (an_en_name) REFERENCES public.arc_enclosure(en_name) ON DELETE RESTRICT;
 A   ALTER TABLE ONLY public.arc_animal DROP CONSTRAINT enclosure_fk;
       public          postgres    false    218    235    4721               �  x�]�Mn�0F��S�����-�A�M�
�R�̈́�A�(9�/�Q�W���7���ȱ�����N��-��q�7�	<=��enx��5}Ҳ�6�Cß׬`�JƊ�T7�N�LQ����#�T>���^X��%��r��`3�!�xL�L�~]OLhx��.�p:��9^�F���O�٪h�%���4����[Ʉ��9�
���膞�ST	~���=Gئ��J�Q )�t����l`����/ǆ��r��RlF:�Zq��*D�KX)
~��p���iG�E��ݴ<.q%I�r���Q�^:�H������x= ��Wz���7��!㞚Y8���rX4�-
E��Diܖ7�n�k����y����:�-spO�3.j��M;4���zӴ�/���n���YM����UL���.�'O珋���FD���Z��ӡ��vܕˍs�S2�枒���?e��O}�^��3=?���m��+�.].dT8Ω���1��g$�         A   x��2����5��1�4�^`��m
&���9����r&%�%g�*$'^������ �Y�         i   x�eι�0�Z�%<�	�fa�9pG�mIB"a�Y�e�#q�a����6Ֆ$W�~�Ҋ�jm�4��^Z#]u��Ϫ���i��f��W���e'�拏-�p�W(r         j   x�3�L/J�+�y�0K!7�B!��#.cLAc.LA.Sβ�ļ�T.3N�Dzinj�~ZQifI�BZQbf1�!�6C.s4S.���`3.KTs.C�\�i1z\\\ �TA�         {  x�}U�r7�ɯ@v	yU�dQ��L�r�H����XX �c}�o���ց�!���`�t�]x�v����x{c8���x�q��S�۽XY�����rT�8;��Fev�f����d@�g�{ȳ��^�`-d��d��9�5�b��F��YY/e�x�5p9~Q4�:p�����q5옲�\����l����6�����)ז���
D
��aG����a*+P$���Kn["c�D��x�c�s6R�|Q��e�!)>
y=�Y>A@۠8q}�S���R6(+PT�r�;��^�.H��pMY{��i�?p�_m�ؑ�?��xv��g�z����ͲNdx���
��UJx`�2����8�d� Wڎ.̔�U���$��N�4��ƥ�q�>s��H6H�n�uk��їS�B�V�Ղ�6m��{ٳf��sJ,[z\H��+(����:Q�R�v�yV#�^[�/:��߼�4>}x�n|��7\�g?�|����螳�5@�m ��=�	b'�B`�~qs��Vl���Dg�(ր�r����N�?�k��l0��&sеBuV�XI��7��2B�A2�ttyF�Z�y��l�)E���.��M�r�)u�=@Qʲ��.��b�+1���xq��(j;�Q�r���12"�:�d�Pٞ/��/T7@&����k5m���cY��79>Rɶ�bv�>�7�2���^�E!-�j����0�C�z��b��N��㮦\�3�]���f&���W���OGƅ���x��.��5r�{P����U^4��W�Gm[�"�I!z��н{�詻�@�ʝ���GI�+����H��W��7�� t�ܲ7���P򥜪
[�`�Fm�ZVT���4�HD�҈l{ҁF���ѕ���r�� �{���x_�.�$�r�6ޑ��#g�~2��N�o��XZ.'��C�P�}��g�٫wH��-y��nkW�p�X:Jx��=j��ٹ(7=�Hd���� ʪIZ-2K��;Ky��A,"`�m*��v��|���q�x��8K��l ����A��9P�tHM�R��x�s�_KV�-�~��v-D�$FW}4}6uݵ������z���1��|�gUӛ�~|w�j^T�i{{�2�`V      !   k   x�3�4202�50�50�3�9K�K�rR���K��9,������2��64£�� ]#�S]�f���ᩩٺ�y)�
�%�
i�We^�l�9Ԕ=... ;�-g         �   x�]�1� ���܅6�.] �()�2T�雪i�.o���1G�"J�z�8<K���k�������y����t4ޟ����Qڜ.A��(�`@:E���ɏ�tmi�S�5GONH[3,�N �ͫIX�������pP�A)��6�         0   x�32�4B.#sN ���4��4� �Zp���@f� ���         �  x���Mn�@���SԬ"��J<���.��D�@dɦƮL*jw;ݮ(���+�Y�&����?�n����W����(<Û�	�6��-��/Q=cҖ��:h������'��Z(ǳ��p�L��#I�f���(�c3�Ґ�a
��$8��E��_&|�:(���pzp4�
xK�r��\�i4l�i�'��}�v�OxI�8�HHu��<�4ù:���Sv;��b����v�k�4��p��Z'u2�v�P�-�$yg[K����NĿ����	�Ҋ�ߪb}�b��p�=�E4�9���&pM�5�L���l<+���U�&[W���_TOL�FŃ�?gް��Eh��誠��V���Íz�Je�7*��P"+.�o�ժ�ǚ�|g�����2��gY��!           x��V���6���`�	bv�d�.�-�C�����ln$RG����|I�&�C�>��$_�R�z�HcK�#�޼��6������ug����:/��j�k]��^{3���JQA|o
	|�\�Z�
x�6إs�CX��<�6�sA�bKm;������J��bP�w�/G��1�>�`u��4!����m��E����s�Rxܲ�Ay���i$Mm��8HX���G��O�ʋw�8���.x��V�-K$"���f��[�Bi�O��=K~W�U��Ȣ|�d�ؾ����O:�Nu�I�$٧�3��Dz�jk�c�Ht��9!4�E�ċն�t�Lh�%�1��"���[�k]"�p�Qot�Zz)8ш����B*ik/v���5�):�#�A׺$�#��%3P�pڃ@(H�%��c2���}���b�ֵ�t>�u�NV�)k��`	-�\Ͷ�o䦪v��nn��cū�kgwO@��J�b�j�9\�ٮ��a�^����98?eǞt�����s�fll�����yd*c"�j��z�znkcgo���(����e&
�u�P��MCs�h�f<��0�z��ᄖPhGg9GAtR3�8�Z�G���<<�_F�8�h��^;;����rZ�TY�BT�~��h$`C� `Kx@+�I-�mT��W�UrNj8��;O=��t�2ߵ5��HGC�p�\�vQ�=�%�0iڂO�ol� ��:�y4+�w�$j/J���qjJ�>#jy;�#����+`-l��x5퇈� ���>�?yZ!�}���(���-��r�v�yh�"TA��l jW�ޜ�(�	@�m �&7�B��\o6�j��	���L��.��S�V�2����H~{���@�f�z����:/���Mf�c!�}:�J\P����*T�4�~�uT���+c�M_����y	C"��b�٢�𠯶k���kD�7�Y�f�>�w�F��8{��{d�9.L�� w1]�.Ib�(Y]��R.	�`�7gpa��# ���ra��� cz�uv�1cR�t9����-�����ԕ���Gk,�`8Gv����N�;ʒ�g�Z  E�1#���5���Y��e�8��f��K ��NA�=�"%NR#��'��Ȇ���~��7����39�s�wY�І;���N��]~�02!�|��|;��q�X�i4.�jC��6�۵l�;Y�m�	0�.��*#m\����ɤT]y�"��Xxk�\w�����-^�7E'�}�~{��K{�߭������\         �  x�m��r�`��5^G����.ʤ@�P�AA�ٟ;����Jb�R��wv�[u 2�C��1h�!/|���_'��՝2-u���(�X����I�aV"�if�ڴm��vϑ'?$䏱"�0*���s��A��=n}\ԭo�V5���S9ي�,E�{���{����/�%���_�)j�`�I�J>������.��e����A�vG�ީ��n�&2�3<��A���� �$�*Ƚ~�x�a��4���D�_ʄ�Bӈ5�d�ƣ�����JfæGץf3���C[�K��r<^ր�,�0�����م���mY!��U��|�����R{��/���1v�A~t�~t4ea噎kRHqx����-4L0=w����b'U�o�A�z�����+1/.Q��ӭKj�7AsFy�c�y���g�b̥nI����T�y巿�dW���'����è��q�#{�8τ��;��,�"a� �X@�!5��^ �8�I�HT[�Q�'�� U(ʳ ���m�K���I����
��@=)$�n�Y|�[]҆@l���f�uu�˥prt}"�3<i�(��\z�������x�\�YI�e�W�(�˘v2��	�N�nh�`��>*�p��*�+�̓DQ���_ˀ�Oξ�Y���g�x�B��j#��\�	8���'�!�]�V���q�         �   x�u���0Eky
/Ζ� %T4�a8 	s�s�	�;9��T�����a����T{@�6Qi�3 -�����y��<�"�����q �V,�,��w�@}���+�Q���I�*{G���қ�E*=F��.�b5\���R���}��U[��"�E�F�E����v'0,�?Ѿ&(����c�˚�`�_D��� �Y;cz8�VV��+8�_�,Q6u9B�@��     