/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     1/13/2022 9:33:28 PM                         */
/*==============================================================*/


drop table if exists APPLY_INVESTASI;

drop table if exists BANK;

drop table if exists CUSTOMER;

drop table if exists DOKUMEN_CUSTOMER;

drop table if exists DOKUMEN_PETANI;

drop table if exists PEMBAYARAN_INVESTASI;

drop table if exists PENGEMBALIAN_DANA;

drop table if exists PETANI;

drop table if exists PROPOSAL_INVESTASI;

drop table if exists USER;

/*==============================================================*/
/* Table: APPLY_INVESTASI                                       */
/*==============================================================*/
create table APPLY_INVESTASI
(
   ID_CUSTOMER          int not null,
   ID_INVESTASI         int not null,
   TGL_APPLY            timestamp not null,
   TOTAL_INVESTASI      int not null,
   primary key (ID_CUSTOMER, ID_INVESTASI)
);

/*==============================================================*/
/* Table: BANK                                                  */
/*==============================================================*/
create table BANK
(
   ID_BANK              int not null,
   NAMA_BANK            varchar(255) not null,
   primary key (ID_BANK)
);

/*==============================================================*/
/* Table: CUSTOMER                                              */
/*==============================================================*/
create table CUSTOMER
(
   ID_CUSTOMER          int not null,
   ID_USER              int not null,
   NAMA_CUSTOMER        varchar(255) not null,
   NAMA_IBUKANDUNG      varchar(255) not null,
   ALAMAT               text not null,
   KOTA                 varchar(255) not null,
   NOMORHP              varchar(12) not null,
   PEKERJAAN            varchar(255) not null,
   SUMBERDANA           varchar(255) not null,
   PENGHASILAN          varchar(255) not null,
   NOMORREKENING        varchar(255) not null,
   primary key (ID_CUSTOMER)
);

/*==============================================================*/
/* Table: DOKUMEN_CUSTOMER                                      */
/*==============================================================*/
create table DOKUMEN_CUSTOMER
(
   ID_DOKUMEN_CUSTOMER  int not null,
   ID_CUSTOMER          int not null,
   FOTOKTP              varchar(255) not null,
   PATH_FOTOKTP         varchar(255) not null,
   SELFIEKTP            varchar(255) not null,
   PATH_SELFIEKTP       varchar(255) not null,
   FOTONPWP             varchar(255) not null,
   PATH_FOTONPWP        varchar(255) not null,
   primary key (ID_DOKUMEN_CUSTOMER)
);

/*==============================================================*/
/* Table: DOKUMEN_PETANI                                        */
/*==============================================================*/
create table DOKUMEN_PETANI
(
   ID_DOKUMEN_PETANI    int not null,
   ID_PETANI            int not null,
   BUKTIPERUSAHAAN      varchar(255) not null,
   PATH_BUKTIPERUSAHAAN varchar(255) not null,
   LAPORANKEUANGAN      varchar(255) not null,
   PATH_LAPORANKEUANGAN varchar(255) not null,
   primary key (ID_DOKUMEN_PETANI)
);

/*==============================================================*/
/* Table: PEMBAYARAN_INVESTASI                                  */
/*==============================================================*/
create table PEMBAYARAN_INVESTASI
(
   ID_PEMBAYARAN        int not null,
   ID_CUSTOMER          int not null,
   ID_INVESTASI         int not null,
   NAMAPEMBAYARAN       varchar(255) not null,
   JUMLAHPEMBAYARAN     int not null,
   TGLPEMBAYARAN        datetime not null,
   STATUSPEMBAYARAN     bool not null,
   primary key (ID_PEMBAYARAN)
);

/*==============================================================*/
/* Table: PENGEMBALIAN_DANA                                     */
/*==============================================================*/
create table PENGEMBALIAN_DANA
(
   ID_PENGEMBALIAN      int not null,
   ID_PEMBAYARAN        int not null,
   ID_PETANI            int not null,
   TGL_PENGEMBALIAN     timestamp not null,
   PRESENTASE_KEUNTUNGAN int not null,
   TOTAL_BAYAR          int not null,
   primary key (ID_PENGEMBALIAN)
);

/*==============================================================*/
/* Table: PETANI                                                */
/*==============================================================*/
create table PETANI
(
   ID_PETANI            int not null,
   ID_USER              int not null,
   NAMA_PJ              varchar(255) not null,
   NAMA_PERUSAHAAN      varchar(255) not null,
   NOTELP_PERUSAHAAN    varchar(255) not null,
   ALAMAT_PERUSAHAAN    text not null,
   LONGITUDE            varchar(255) not null,
   LATITUDE             varchar(255) not null,
   QRCODE               varchar(255) not null,
   NOMORREKENING        varchar(255),
   STATUS_PROPOSAL      bool not null,
   primary key (ID_PETANI)
);

/*==============================================================*/
/* Table: PROPOSAL_INVESTASI                                    */
/*==============================================================*/
create table PROPOSAL_INVESTASI
(
   ID_INVESTASI         int not null,
   ID_PETANI            int not null,
   NAMA_PROYEK          varchar(255) not null,
   JUMLAHKEBUTUHAN      int not null,
   PERIODEKONTRAK       int not null,
   JUMLAHPENGEMBALIAN   int not null,
   JENISINVESTASI       varchar(255) not null,
   STATUS_PROPOSAL      bool not null,
   primary key (ID_INVESTASI)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              int not null,
   USERNAME             varchar(255) not null,
   PASSWORD             varchar(10) not null,
   ROLE                 varchar(10),
   EMAIL                char(255) not null,
   NAMA                 varchar(255) not null,
   primary key (ID_USER)
);

alter table APPLY_INVESTASI add constraint FK_MENYETUJUI foreign key (ID_INVESTASI)
      references PROPOSAL_INVESTASI (ID_INVESTASI) on delete restrict on update restrict;

alter table APPLY_INVESTASI add constraint FK_MENYETUJUI_2 foreign key (ID_CUSTOMER)
      references CUSTOMER (ID_CUSTOMER) on delete restrict on update restrict;

alter table CUSTOMER add constraint FK_MENDAFTAR foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table DOKUMEN_CUSTOMER add constraint FK_MEMILIKI foreign key (ID_CUSTOMER)
      references CUSTOMER (ID_CUSTOMER) on delete restrict on update restrict;

alter table DOKUMEN_PETANI add constraint FK_MEMILIKI_2 foreign key (ID_PETANI)
      references PETANI (ID_PETANI) on delete restrict on update restrict;

alter table PEMBAYARAN_INVESTASI add constraint FK_MELAKUKAN foreign key (ID_CUSTOMER, ID_INVESTASI)
      references APPLY_INVESTASI (ID_CUSTOMER, ID_INVESTASI) on delete restrict on update restrict;

alter table PENGEMBALIAN_DANA add constraint FK_MELAKUKAN_2 foreign key (ID_PETANI)
      references PETANI (ID_PETANI) on delete restrict on update restrict;

alter table PENGEMBALIAN_DANA add constraint FK_MELAKUKAN_4 foreign key (ID_PEMBAYARAN)
      references PEMBAYARAN_INVESTASI (ID_PEMBAYARAN) on delete restrict on update restrict;

alter table PETANI add constraint FK_MENDAFTAR_2 foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table PROPOSAL_INVESTASI add constraint FK_MENGAJUKAN foreign key (ID_PETANI)
      references PETANI (ID_PETANI) on delete restrict on update restrict;

