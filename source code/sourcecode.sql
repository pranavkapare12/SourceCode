PGDMP  '    $                }         
   sourcecode     16.8 (Ubuntu 16.8-1.pgdg22.04+1)     17.4 (Ubuntu 17.4-1.pgdg22.04+2) j    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    16868 
   sourcecode    DATABASE     p   CREATE DATABASE sourcecode WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_IN';
    DROP DATABASE sourcecode;
                     postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                     pg_database_owner    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                        pg_database_owner    false    4            �            1259    17086    comment    TABLE     �   CREATE TABLE public.comment (
    cid integer NOT NULL,
    sid integer,
    user_id integer,
    content text,
    ts date,
    event_time time without time zone
);
    DROP TABLE public.comment;
       public         heap r       postgres    false    4            �            1259    17085    comment_cid_seq    SEQUENCE     �   CREATE SEQUENCE public.comment_cid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.comment_cid_seq;
       public               postgres    false    4    232            �           0    0    comment_cid_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.comment_cid_seq OWNED BY public.comment.cid;
          public               postgres    false    231            �            1259    17106    comment_rep    TABLE     a   CREATE TABLE public.comment_rep (
    rid integer NOT NULL,
    cid integer,
    content text
);
    DROP TABLE public.comment_rep;
       public         heap r       postgres    false    4            �            1259    17105    comment_rep_rid_seq    SEQUENCE     �   CREATE SEQUENCE public.comment_rep_rid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.comment_rep_rid_seq;
       public               postgres    false    4    234            �           0    0    comment_rep_rid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.comment_rep_rid_seq OWNED BY public.comment_rep.rid;
          public               postgres    false    233            �            1259    16960    follower_table    TABLE     |   CREATE TABLE public.follower_table (
    sr integer NOT NULL,
    user_id integer,
    follower_id integer,
    fad date
);
 "   DROP TABLE public.follower_table;
       public         heap r       postgres    false    4            �            1259    16959    follower_table_sr_seq    SEQUENCE     �   CREATE SEQUENCE public.follower_table_sr_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.follower_table_sr_seq;
       public               postgres    false    218    4            �           0    0    follower_table_sr_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.follower_table_sr_seq OWNED BY public.follower_table.sr;
          public               postgres    false    217            �            1259    16981    following_table    TABLE     ~   CREATE TABLE public.following_table (
    sr integer NOT NULL,
    user_id integer,
    following_id integer,
    fad date
);
 #   DROP TABLE public.following_table;
       public         heap r       postgres    false    4            �            1259    16980    following_table_sr_seq    SEQUENCE     �   CREATE SEQUENCE public.following_table_sr_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.following_table_sr_seq;
       public               postgres    false    220    4            �           0    0    following_table_sr_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.following_table_sr_seq OWNED BY public.following_table.sr;
          public               postgres    false    219            �            1259    17121    fork    TABLE     o   CREATE TABLE public.fork (
    fork_id integer NOT NULL,
    osid integer,
    fsid integer,
    fdate date
);
    DROP TABLE public.fork;
       public         heap r       postgres    false    4            �            1259    17120    fork_fork_id_seq    SEQUENCE     �   CREATE SEQUENCE public.fork_fork_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.fork_fork_id_seq;
       public               postgres    false    4    236            �           0    0    fork_fork_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.fork_fork_id_seq OWNED BY public.fork.fork_id;
          public               postgres    false    235            �            1259    17014    groupmember    TABLE     v   CREATE TABLE public.groupmember (
    sr integer NOT NULL,
    group_id integer,
    user_id integer,
    doj date
);
    DROP TABLE public.groupmember;
       public         heap r       postgres    false    4            �            1259    17013    groupmember_sr_seq    SEQUENCE     �   CREATE SEQUENCE public.groupmember_sr_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.groupmember_sr_seq;
       public               postgres    false    4    224            �           0    0    groupmember_sr_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.groupmember_sr_seq OWNED BY public.groupmember.sr;
          public               postgres    false    223            �            1259    17032    groupmessage    TABLE     y   CREATE TABLE public.groupmessage (
    gm_id integer NOT NULL,
    group_id integer,
    user_id integer,
    ts date
);
     DROP TABLE public.groupmessage;
       public         heap r       postgres    false    4            �            1259    17031    groupmessage_gm_id_seq    SEQUENCE     �   CREATE SEQUENCE public.groupmessage_gm_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.groupmessage_gm_id_seq;
       public               postgres    false    4    226            �           0    0    groupmessage_gm_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.groupmessage_gm_id_seq OWNED BY public.groupmessage.gm_id;
          public               postgres    false    225            �            1259    17001    groups    TABLE     �   CREATE TABLE public.groups (
    group_id integer NOT NULL,
    group_name character varying(15),
    createby integer,
    created_at date
);
    DROP TABLE public.groups;
       public         heap r       postgres    false    4            �            1259    17000    groups_group_id_seq    SEQUENCE     �   CREATE SEQUENCE public.groups_group_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.groups_group_id_seq;
       public               postgres    false    222    4            �           0    0    groups_group_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.groups_group_id_seq OWNED BY public.groups.group_id;
          public               postgres    false    221            �            1259    17143    likes    TABLE     D   CREATE TABLE public.likes (
    sid integer,
    user_id integer
);
    DROP TABLE public.likes;
       public         heap r       postgres    false    4            �            1259    17050    message    TABLE     �   CREATE TABLE public.message (
    sr_no integer NOT NULL,
    sender_id integer,
    reciver_id integer,
    content text,
    ts date,
    m_time time without time zone
);
    DROP TABLE public.message;
       public         heap r       postgres    false    4            �            1259    17049    message_sr_no_seq    SEQUENCE     �   CREATE SEQUENCE public.message_sr_no_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.message_sr_no_seq;
       public               postgres    false    228    4            �           0    0    message_sr_no_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.message_sr_no_seq OWNED BY public.message.sr_no;
          public               postgres    false    227            �            1259    17071    snippet    TABLE     �  CREATE TABLE public.snippet (
    sid integer NOT NULL,
    user_id integer,
    stitle character varying(30),
    scontent text,
    lang character varying(9),
    created_at date,
    modify_at date,
    visibility character varying(1),
    description text,
    tags text,
    likes_count integer,
    comment_count integer,
    isfoked boolean,
    original_snippet_id integer,
    code_result text,
    collaborators_cnt integer
);
    DROP TABLE public.snippet;
       public         heap r       postgres    false    4            �            1259    17070    snippet_sid_seq    SEQUENCE     �   CREATE SEQUENCE public.snippet_sid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.snippet_sid_seq;
       public               postgres    false    4    230            �           0    0    snippet_sid_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.snippet_sid_seq OWNED BY public.snippet.sid;
          public               postgres    false    229            �            1259    16870    users    TABLE     �  CREATE TABLE public.users (
    user_id integer NOT NULL,
    uname character varying(20),
    email character varying(30),
    password character varying(10),
    profile_picture bit(1),
    bio text,
    rdate date,
    lastlogin date,
    status character varying(1),
    phoneno character varying(12),
    country character varying(2),
    lang_pref character varying(10),
    dob date,
    gender character varying(1),
    fork_count integer
);
    DROP TABLE public.users;
       public         heap r       postgres    false    4            �            1259    16869    users_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_user_id_seq;
       public               postgres    false    4    216            �           0    0    users_user_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;
          public               postgres    false    215            �           2604    17089    comment cid    DEFAULT     j   ALTER TABLE ONLY public.comment ALTER COLUMN cid SET DEFAULT nextval('public.comment_cid_seq'::regclass);
 :   ALTER TABLE public.comment ALTER COLUMN cid DROP DEFAULT;
       public               postgres    false    232    231    232            �           2604    17109    comment_rep rid    DEFAULT     r   ALTER TABLE ONLY public.comment_rep ALTER COLUMN rid SET DEFAULT nextval('public.comment_rep_rid_seq'::regclass);
 >   ALTER TABLE public.comment_rep ALTER COLUMN rid DROP DEFAULT;
       public               postgres    false    233    234    234            �           2604    16963    follower_table sr    DEFAULT     v   ALTER TABLE ONLY public.follower_table ALTER COLUMN sr SET DEFAULT nextval('public.follower_table_sr_seq'::regclass);
 @   ALTER TABLE public.follower_table ALTER COLUMN sr DROP DEFAULT;
       public               postgres    false    217    218    218            �           2604    16984    following_table sr    DEFAULT     x   ALTER TABLE ONLY public.following_table ALTER COLUMN sr SET DEFAULT nextval('public.following_table_sr_seq'::regclass);
 A   ALTER TABLE public.following_table ALTER COLUMN sr DROP DEFAULT;
       public               postgres    false    220    219    220            �           2604    17124    fork fork_id    DEFAULT     l   ALTER TABLE ONLY public.fork ALTER COLUMN fork_id SET DEFAULT nextval('public.fork_fork_id_seq'::regclass);
 ;   ALTER TABLE public.fork ALTER COLUMN fork_id DROP DEFAULT;
       public               postgres    false    236    235    236            �           2604    17017    groupmember sr    DEFAULT     p   ALTER TABLE ONLY public.groupmember ALTER COLUMN sr SET DEFAULT nextval('public.groupmember_sr_seq'::regclass);
 =   ALTER TABLE public.groupmember ALTER COLUMN sr DROP DEFAULT;
       public               postgres    false    224    223    224            �           2604    17035    groupmessage gm_id    DEFAULT     x   ALTER TABLE ONLY public.groupmessage ALTER COLUMN gm_id SET DEFAULT nextval('public.groupmessage_gm_id_seq'::regclass);
 A   ALTER TABLE public.groupmessage ALTER COLUMN gm_id DROP DEFAULT;
       public               postgres    false    226    225    226            �           2604    17004    groups group_id    DEFAULT     r   ALTER TABLE ONLY public.groups ALTER COLUMN group_id SET DEFAULT nextval('public.groups_group_id_seq'::regclass);
 >   ALTER TABLE public.groups ALTER COLUMN group_id DROP DEFAULT;
       public               postgres    false    222    221    222            �           2604    17053    message sr_no    DEFAULT     n   ALTER TABLE ONLY public.message ALTER COLUMN sr_no SET DEFAULT nextval('public.message_sr_no_seq'::regclass);
 <   ALTER TABLE public.message ALTER COLUMN sr_no DROP DEFAULT;
       public               postgres    false    228    227    228            �           2604    17074    snippet sid    DEFAULT     j   ALTER TABLE ONLY public.snippet ALTER COLUMN sid SET DEFAULT nextval('public.snippet_sid_seq'::regclass);
 :   ALTER TABLE public.snippet ALTER COLUMN sid DROP DEFAULT;
       public               postgres    false    230    229    230            �           2604    16873    users user_id    DEFAULT     n   ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);
 <   ALTER TABLE public.users ALTER COLUMN user_id DROP DEFAULT;
       public               postgres    false    215    216    216            �          0    17086    comment 
   TABLE DATA           M   COPY public.comment (cid, sid, user_id, content, ts, event_time) FROM stdin;
    public               postgres    false    232   �       �          0    17106    comment_rep 
   TABLE DATA           8   COPY public.comment_rep (rid, cid, content) FROM stdin;
    public               postgres    false    234   ��       �          0    16960    follower_table 
   TABLE DATA           G   COPY public.follower_table (sr, user_id, follower_id, fad) FROM stdin;
    public               postgres    false    218   ��       �          0    16981    following_table 
   TABLE DATA           I   COPY public.following_table (sr, user_id, following_id, fad) FROM stdin;
    public               postgres    false    220   �       �          0    17121    fork 
   TABLE DATA           :   COPY public.fork (fork_id, osid, fsid, fdate) FROM stdin;
    public               postgres    false    236   =�       �          0    17014    groupmember 
   TABLE DATA           A   COPY public.groupmember (sr, group_id, user_id, doj) FROM stdin;
    public               postgres    false    224   Z�       �          0    17032    groupmessage 
   TABLE DATA           D   COPY public.groupmessage (gm_id, group_id, user_id, ts) FROM stdin;
    public               postgres    false    226   w�       �          0    17001    groups 
   TABLE DATA           L   COPY public.groups (group_id, group_name, createby, created_at) FROM stdin;
    public               postgres    false    222   ��       �          0    17143    likes 
   TABLE DATA           -   COPY public.likes (sid, user_id) FROM stdin;
    public               postgres    false    237   ��       �          0    17050    message 
   TABLE DATA           T   COPY public.message (sr_no, sender_id, reciver_id, content, ts, m_time) FROM stdin;
    public               postgres    false    228   Ձ       �          0    17071    snippet 
   TABLE DATA           �   COPY public.snippet (sid, user_id, stitle, scontent, lang, created_at, modify_at, visibility, description, tags, likes_count, comment_count, isfoked, original_snippet_id, code_result, collaborators_cnt) FROM stdin;
    public               postgres    false    230   @�       �          0    16870    users 
   TABLE DATA           �   COPY public.users (user_id, uname, email, password, profile_picture, bio, rdate, lastlogin, status, phoneno, country, lang_pref, dob, gender, fork_count) FROM stdin;
    public               postgres    false    216   È       �           0    0    comment_cid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.comment_cid_seq', 30, true);
          public               postgres    false    231            �           0    0    comment_rep_rid_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.comment_rep_rid_seq', 1, false);
          public               postgres    false    233            �           0    0    follower_table_sr_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.follower_table_sr_seq', 239, true);
          public               postgres    false    217            �           0    0    following_table_sr_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.following_table_sr_seq', 153, true);
          public               postgres    false    219            �           0    0    fork_fork_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.fork_fork_id_seq', 1, false);
          public               postgres    false    235            �           0    0    groupmember_sr_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.groupmember_sr_seq', 1, false);
          public               postgres    false    223            �           0    0    groupmessage_gm_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.groupmessage_gm_id_seq', 1, false);
          public               postgres    false    225            �           0    0    groups_group_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.groups_group_id_seq', 1, false);
          public               postgres    false    221            �           0    0    message_sr_no_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.message_sr_no_seq', 45, true);
          public               postgres    false    227            �           0    0    snippet_sid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.snippet_sid_seq', 27, true);
          public               postgres    false    229            �           0    0    users_user_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.users_user_id_seq', 8, true);
          public               postgres    false    215            �           2606    17093    comment comment_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.comment
    ADD CONSTRAINT comment_pkey PRIMARY KEY (cid);
 >   ALTER TABLE ONLY public.comment DROP CONSTRAINT comment_pkey;
       public                 postgres    false    232            �           2606    17113    comment_rep comment_rep_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.comment_rep
    ADD CONSTRAINT comment_rep_pkey PRIMARY KEY (rid);
 F   ALTER TABLE ONLY public.comment_rep DROP CONSTRAINT comment_rep_pkey;
       public                 postgres    false    234            �           2606    16965 "   follower_table follower_table_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.follower_table
    ADD CONSTRAINT follower_table_pkey PRIMARY KEY (sr);
 L   ALTER TABLE ONLY public.follower_table DROP CONSTRAINT follower_table_pkey;
       public                 postgres    false    218            �           2606    16967 5   follower_table follower_table_user_id_follower_id_key 
   CONSTRAINT     �   ALTER TABLE ONLY public.follower_table
    ADD CONSTRAINT follower_table_user_id_follower_id_key UNIQUE (user_id, follower_id);
 _   ALTER TABLE ONLY public.follower_table DROP CONSTRAINT follower_table_user_id_follower_id_key;
       public                 postgres    false    218    218            �           2606    16986 $   following_table following_table_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.following_table
    ADD CONSTRAINT following_table_pkey PRIMARY KEY (sr);
 N   ALTER TABLE ONLY public.following_table DROP CONSTRAINT following_table_pkey;
       public                 postgres    false    220            �           2606    16988 8   following_table following_table_user_id_following_id_key 
   CONSTRAINT     �   ALTER TABLE ONLY public.following_table
    ADD CONSTRAINT following_table_user_id_following_id_key UNIQUE (user_id, following_id);
 b   ALTER TABLE ONLY public.following_table DROP CONSTRAINT following_table_user_id_following_id_key;
       public                 postgres    false    220    220            �           2606    17126    fork fork_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.fork
    ADD CONSTRAINT fork_pkey PRIMARY KEY (fork_id);
 8   ALTER TABLE ONLY public.fork DROP CONSTRAINT fork_pkey;
       public                 postgres    false    236            �           2606    17019    groupmember groupmember_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.groupmember
    ADD CONSTRAINT groupmember_pkey PRIMARY KEY (sr);
 F   ALTER TABLE ONLY public.groupmember DROP CONSTRAINT groupmember_pkey;
       public                 postgres    false    224            �           2606    17037    groupmessage groupmessage_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.groupmessage
    ADD CONSTRAINT groupmessage_pkey PRIMARY KEY (gm_id);
 H   ALTER TABLE ONLY public.groupmessage DROP CONSTRAINT groupmessage_pkey;
       public                 postgres    false    226            �           2606    17006    groups groups_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (group_id);
 <   ALTER TABLE ONLY public.groups DROP CONSTRAINT groups_pkey;
       public                 postgres    false    222            �           2606    17057    message message_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.message
    ADD CONSTRAINT message_pkey PRIMARY KEY (sr_no);
 >   ALTER TABLE ONLY public.message DROP CONSTRAINT message_pkey;
       public                 postgres    false    228            �           2606    17078    snippet snippet_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.snippet
    ADD CONSTRAINT snippet_pkey PRIMARY KEY (sid);
 >   ALTER TABLE ONLY public.snippet DROP CONSTRAINT snippet_pkey;
       public                 postgres    false    230            �           2606    16877    users users_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public                 postgres    false    216            �           2606    17114     comment_rep comment_rep_cid_fkey    FK CONSTRAINT     ~   ALTER TABLE ONLY public.comment_rep
    ADD CONSTRAINT comment_rep_cid_fkey FOREIGN KEY (cid) REFERENCES public.comment(cid);
 J   ALTER TABLE ONLY public.comment_rep DROP CONSTRAINT comment_rep_cid_fkey;
       public               postgres    false    234    3304    232            �           2606    17094    comment comment_sid_fkey    FK CONSTRAINT     v   ALTER TABLE ONLY public.comment
    ADD CONSTRAINT comment_sid_fkey FOREIGN KEY (sid) REFERENCES public.snippet(sid);
 B   ALTER TABLE ONLY public.comment DROP CONSTRAINT comment_sid_fkey;
       public               postgres    false    230    3302    232            �           2606    17099    comment comment_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.comment
    ADD CONSTRAINT comment_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 F   ALTER TABLE ONLY public.comment DROP CONSTRAINT comment_user_id_fkey;
       public               postgres    false    232    3284    216            �           2606    16973 .   follower_table follower_table_follower_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.follower_table
    ADD CONSTRAINT follower_table_follower_id_fkey FOREIGN KEY (follower_id) REFERENCES public.users(user_id);
 X   ALTER TABLE ONLY public.follower_table DROP CONSTRAINT follower_table_follower_id_fkey;
       public               postgres    false    216    3284    218            �           2606    16968 *   follower_table follower_table_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.follower_table
    ADD CONSTRAINT follower_table_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 T   ALTER TABLE ONLY public.follower_table DROP CONSTRAINT follower_table_user_id_fkey;
       public               postgres    false    216    218    3284            �           2606    16994 1   following_table following_table_following_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.following_table
    ADD CONSTRAINT following_table_following_id_fkey FOREIGN KEY (following_id) REFERENCES public.users(user_id);
 [   ALTER TABLE ONLY public.following_table DROP CONSTRAINT following_table_following_id_fkey;
       public               postgres    false    220    216    3284            �           2606    16989 ,   following_table following_table_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.following_table
    ADD CONSTRAINT following_table_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 V   ALTER TABLE ONLY public.following_table DROP CONSTRAINT following_table_user_id_fkey;
       public               postgres    false    3284    216    220            �           2606    17132    fork fork_fsid_fkey    FK CONSTRAINT     r   ALTER TABLE ONLY public.fork
    ADD CONSTRAINT fork_fsid_fkey FOREIGN KEY (fsid) REFERENCES public.snippet(sid);
 =   ALTER TABLE ONLY public.fork DROP CONSTRAINT fork_fsid_fkey;
       public               postgres    false    3302    236    230            �           2606    17127    fork fork_osid_fkey    FK CONSTRAINT     r   ALTER TABLE ONLY public.fork
    ADD CONSTRAINT fork_osid_fkey FOREIGN KEY (osid) REFERENCES public.snippet(sid);
 =   ALTER TABLE ONLY public.fork DROP CONSTRAINT fork_osid_fkey;
       public               postgres    false    230    3302    236            �           2606    17020 %   groupmember groupmember_group_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.groupmember
    ADD CONSTRAINT groupmember_group_id_fkey FOREIGN KEY (group_id) REFERENCES public.groups(group_id);
 O   ALTER TABLE ONLY public.groupmember DROP CONSTRAINT groupmember_group_id_fkey;
       public               postgres    false    3294    222    224            �           2606    17025 $   groupmember groupmember_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.groupmember
    ADD CONSTRAINT groupmember_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 N   ALTER TABLE ONLY public.groupmember DROP CONSTRAINT groupmember_user_id_fkey;
       public               postgres    false    216    224    3284            �           2606    17038 '   groupmessage groupmessage_group_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.groupmessage
    ADD CONSTRAINT groupmessage_group_id_fkey FOREIGN KEY (group_id) REFERENCES public.groups(group_id);
 Q   ALTER TABLE ONLY public.groupmessage DROP CONSTRAINT groupmessage_group_id_fkey;
       public               postgres    false    222    3294    226            �           2606    17043 &   groupmessage groupmessage_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.groupmessage
    ADD CONSTRAINT groupmessage_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 P   ALTER TABLE ONLY public.groupmessage DROP CONSTRAINT groupmessage_user_id_fkey;
       public               postgres    false    3284    226    216            �           2606    17007    groups groups_createby_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_createby_fkey FOREIGN KEY (createby) REFERENCES public.users(user_id);
 E   ALTER TABLE ONLY public.groups DROP CONSTRAINT groups_createby_fkey;
       public               postgres    false    222    3284    216            �           2606    17146    likes likes_sid_fkey    FK CONSTRAINT     r   ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_sid_fkey FOREIGN KEY (sid) REFERENCES public.snippet(sid);
 >   ALTER TABLE ONLY public.likes DROP CONSTRAINT likes_sid_fkey;
       public               postgres    false    237    3302    230            �           2606    17151    likes likes_user_id_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 B   ALTER TABLE ONLY public.likes DROP CONSTRAINT likes_user_id_fkey;
       public               postgres    false    237    3284    216            �           2606    17063    message message_reciver_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message
    ADD CONSTRAINT message_reciver_id_fkey FOREIGN KEY (reciver_id) REFERENCES public.users(user_id);
 I   ALTER TABLE ONLY public.message DROP CONSTRAINT message_reciver_id_fkey;
       public               postgres    false    228    3284    216            �           2606    17058    message message_sender_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message
    ADD CONSTRAINT message_sender_id_fkey FOREIGN KEY (sender_id) REFERENCES public.users(user_id);
 H   ALTER TABLE ONLY public.message DROP CONSTRAINT message_sender_id_fkey;
       public               postgres    false    228    3284    216            �           2606    17079    snippet snippet_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.snippet
    ADD CONSTRAINT snippet_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(user_id);
 F   ALTER TABLE ONLY public.snippet DROP CONSTRAINT snippet_user_id_fkey;
       public               postgres    false    3284    216    230            �   �   x�e��j�`�g�)�p�N�[[�нk���SC��%�$�A�@ߝ���T��<�AP;A��k�D��r�Y.�c��K9|��{-�0�&�?ɝ�ru`8��s�I��ҩn	��}�GUƎr���Vw�7��eK�����A)��a��?�)��xH�e�d�<� K����6l�a�Y��鍙�</L      �      x������ � �      �   ?   x�5��  �7c@Q�	+��:���&�d�uڋ�Lp$U@�T0�m ۥ#?���*�3�rC      �   <   x�5ʹ  ��(��
+��:�/�`Y�������i�G�	�d�r(ɸlIۜ��ϳ-      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x�32�4�2�1z\\\ ��      �   [   x�Mʹ�0 �ڞ�b���	��"�w�ҕ��=���e��*4�s��^�������4Kr��֋��ē#M)��v�?P��      �   s  x��kS�8��[1�I $��G��dJZ�A������[I|Ulc+���]�vllJ۹�t��Hڗ�)���X;V�� X�/D�X�~�ʅ'^�a�b��/���`���>I�]��zw%OH�y$��Пhq!}w�� ~����]H�4h�440C�6�3 �B-� "�@�=����V�D�|%Ev�W�}���^�	��0�~ �fn���B�O8O��
��z���s �twÅ�/�%b���0&�b���4?�����@�y��^���	���CN��7�\��=��I�ÂK�%�z͸�a���f~��r���L�����M�s[�tNZnY���{�����:�O���p����=O-CK�
��N�g��,����?)����:�� �DY�l+��_�������a*[")Q�J���'��Dߩ����*���q�rh��S�Lp/GSmI8۽
�T� �D��W�Ke3%���^5�%m�&>���F��N����J�A�V\��<�0�ߢ\f��)��O�G�Pf�O�Jj�U,�o�+9�~������&A�6&z;B�H���GY�A���QQh9�h9P�4��n2��T�X��#�[��}Uc(�������+���7E���(���T�*�>Fa��qA�@\�GkL|(�ף�e�oR�O�.�]Vc9�U��� ^�,Җ==G��N��ܬ�x�T�8r
��ct�&�*����ՠzB
%�A�ā�&1w u��-����� B�ܨ7xitj�Б�]�Kb��w�k�B�XVd>�������X?�|)��Y�F1���&��!6����z���2,���ET�$a��ǂ�v��9�؇�o	�'���\�؝���)N�i�������Y߀�{k�K8��iM���ڵ�~h). �SaQj=�?y5�s���K:�IB��q�X	�9��Is�ͅ���x�尳�k�9���g�î|��n�a���Y�<K�S3�W�+l��7V(�v��p:��L�+)���^\�i���qE�Dݔ��]��T*k���>����cT�	s�\i���ҟ{�
�9+$s����躾6��%5��r��w-�u�^H7�P!ߔ�a�E�� 㙟 �x�8Zp������k�y�٥�	�8����P�XL6S*J�����e[\s�F�(t%ɧ̮�:��|<���TZ,/�_4��RHV�z.Wu�8�ܷ։���&Ik=�aWN�5����p
�0C�k�bK�8�Gp:�'���>�M>>���##���g'�^�DdKD��H���[d�+J�?|.o4������;ӏ`�D��lF��6�������q8�`�nD���t�-sL����h X��[���-`�Ņ�y��~��=�]��J BHð���TDz<q������[UU��L���Q7ئ�e�f�"��E���5=r>�E�j�Eq�B7���"��X����33��ぞ��Ʋ���dxj���W�h��d$��7���AɌe[:�Z}�����gZ�|��i�;y�Y�f^���GyX̽lOJ���P��_��ԛ��}"l��+l�^�݂��E�4��/���u�-�Fq8���Z7e�UWS������ _.E      �   �   x�}��
�0�����L��Cz7�7��z��c['-��N���@JB����d�YlI�e��\e�U3:t�0*z��7oO�6� ��I"�̢sc|�>7������.�8���,�O �>�� dW���<�ؘA�`<�_)4��b�"+_�0]���-�0����O������,Fp����B������������3ũ����$I���|�     