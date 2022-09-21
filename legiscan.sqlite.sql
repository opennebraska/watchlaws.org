BEGIN TRANSACTION;
DROP TABLE IF EXISTS "ls_bill_progress";
CREATE TABLE IF NOT EXISTS "ls_bill_progress" (
	"bill_id"	,
	"progress_step"	,
	"progress_date"	,
	"progress_event_id"	
);
DROP TABLE IF EXISTS "ls_bill_vote_detail";
CREATE TABLE IF NOT EXISTS "ls_bill_vote_detail" (
	"roll_call_id"	,
	"people_id"	,
	"vote_id"	
);
DROP TABLE IF EXISTS "ls_reason";
CREATE TABLE IF NOT EXISTS "ls_reason" (
	"reason_id"	,
	"reason_desc"	
);
DROP TABLE IF EXISTS "ls_mime_type";
CREATE TABLE IF NOT EXISTS "ls_mime_type" (
	"mime_id"	,
	"mime_type"	,
	"mime_ext"	,
	"is_binary"	
);
DROP TABLE IF EXISTS "ls_body";
CREATE TABLE IF NOT EXISTS "ls_body" (
	"body_id"	,
	"state_id"	,
	"role_id"	,
	"body_abbr"	,
	"body_short"	,
	"body_name"	,
	"body_role_abbr"	,
	"body_role_name"	
);
DROP TABLE IF EXISTS "ls_committee";
CREATE TABLE IF NOT EXISTS "ls_committee" (
	"committee_id"	,
	"committee_body_id"	,
	"committee_name"	
);
DROP TABLE IF EXISTS "ls_bill_amendment";
CREATE TABLE IF NOT EXISTS "ls_bill_amendment" (
	"amendment_id"	,
	"bill_id"	,
	"adopted"	,
	"amendment_body_id"	,
	"amendment_mime_id"	,
	"amendment_date"	,
	"amendment_title"	,
	"amendment_desc"	,
	"amendment_size"	,
	"amendment_hash"	,
	"local_copy"	,
	"local_fragment"	,
	"legiscan_url"	,
	"state_url"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_signal";
CREATE TABLE IF NOT EXISTS "ls_signal" (
	"object_type"	,
	"object_id"	,
	"processed"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_vote";
CREATE TABLE IF NOT EXISTS "ls_vote" (
	"vote_id"	,
	"vote_desc"	
);
DROP TABLE IF EXISTS "ls_event_type";
CREATE TABLE IF NOT EXISTS "ls_event_type" (
	"event_type_id"	,
	"event_type_desc"	
);
DROP TABLE IF EXISTS "ls_ignore";
CREATE TABLE IF NOT EXISTS "ls_ignore" (
	"bill_id"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_bill_history";
CREATE TABLE IF NOT EXISTS "ls_bill_history" (
	"bill_id"	,
	"history_step"	,
	"history_major"	,
	"history_body_id"	,
	"history_date"	,
	"history_action"	
);
DROP TABLE IF EXISTS "ls_supplement_type";
CREATE TABLE IF NOT EXISTS "ls_supplement_type" (
	"supplement_type_id"	,
	"supplement_type_desc"	
);
DROP TABLE IF EXISTS "ls_bill_vote";
CREATE TABLE IF NOT EXISTS "ls_bill_vote" (
	"roll_call_id"	,
	"bill_id"	,
	"roll_call_body_id"	,
	"roll_call_date"	,
	"roll_call_desc"	,
	"yea"	,
	"nay"	,
	"nv"	,
	"absent"	,
	"total"	,
	"passed"	,
	"legiscan_url"	,
	"state_url"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_bill_supplement";
CREATE TABLE IF NOT EXISTS "ls_bill_supplement" (
	"supplement_id"	,
	"bill_id"	,
	"supplement_type_id"	,
	"supplement_mime_id"	,
	"supplement_date"	,
	"supplement_title"	,
	"supplement_desc"	,
	"supplement_size"	,
	"supplement_hash"	,
	"local_copy"	,
	"local_fragment"	,
	"legiscan_url"	,
	"state_url"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_progress";
CREATE TABLE IF NOT EXISTS "ls_progress" (
	"progress_event_id"	,
	"progress_desc"	
);
DROP TABLE IF EXISTS "ls_sast_type";
CREATE TABLE IF NOT EXISTS "ls_sast_type" (
	"sast_id"	,
	"sast_description"	
);
DROP TABLE IF EXISTS "ls_bill";
CREATE TABLE IF NOT EXISTS "ls_bill" (
	"bill_id"	,
	"state_id"	,
	"session_id"	,
	"body_id"	,
	"current_body_id"	,
	"bill_type_id"	,
	"bill_number"	,
	"status_id"	,
	"status_date"	,
	"title"	,
	"description"	,
	"pending_committee_id"	,
	"legiscan_url"	,
	"state_url"	,
	"change_hash"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_text_type";
CREATE TABLE IF NOT EXISTS "ls_text_type" (
	"bill_text_type_id"	,
	"bill_text_name"	,
	"bill_text_sort"	,
	"bill_text_supplement"	
);
DROP TABLE IF EXISTS "ls_sponsor_type";
CREATE TABLE IF NOT EXISTS "ls_sponsor_type" (
	"sponsor_type_id"	,
	"sponsor_type_desc"	
);
DROP TABLE IF EXISTS "ls_type";
CREATE TABLE IF NOT EXISTS "ls_type" (
	"bill_type_id"	,
	"bill_type_name"	,
	"bill_type_abbr"	
);
DROP TABLE IF EXISTS "ls_state";
CREATE TABLE IF NOT EXISTS "ls_state" (
	"state_id"	,
	"state_abbr"	,
	"state_name"	,
	"biennium"	,
	"carry_over"	,
	"capitol"	,
	"latitude"	,
	"longitude"	
);
DROP TABLE IF EXISTS "ls_subject";
CREATE TABLE IF NOT EXISTS "ls_subject" (
	"subject_id"	,
	"state_id"	,
	"subject_name"	
);
DROP TABLE IF EXISTS "ls_monitor";
CREATE TABLE IF NOT EXISTS "ls_monitor" (
	"bill_id"	,
	"stance"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_bill_referral";
CREATE TABLE IF NOT EXISTS "ls_bill_referral" (
	"bill_id"	,
	"referral_step"	,
	"referral_date"	,
	"committee_id"	
);
DROP TABLE IF EXISTS "ls_party";
CREATE TABLE IF NOT EXISTS "ls_party" (
	"party_id"	,
	"party_abbr"	,
	"party_short"	,
	"party_name"	
);
DROP TABLE IF EXISTS "ls_bill_reason";
CREATE TABLE IF NOT EXISTS "ls_bill_reason" (
	"bill_id"	,
	"reason_id"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_bill_sponsor";
CREATE TABLE IF NOT EXISTS "ls_bill_sponsor" (
	"bill_id"	,
	"people_id"	,
	"sponsor_order"	,
	"sponsor_type_id"	
);
DROP TABLE IF EXISTS "ls_variable";
CREATE TABLE IF NOT EXISTS "ls_variable" (
	"name"	,
	"value"	
);
DROP TABLE IF EXISTS "ls_bill_text";
CREATE TABLE IF NOT EXISTS "ls_bill_text" (
	"text_id"	,
	"bill_id"	,
	"bill_text_type_id"	,
	"bill_text_mime_id"	,
	"bill_text_date"	,
	"bill_text_size"	,
	"bill_text_hash"	,
	"local_copy"	,
	"local_fragment"	,
	"legiscan_url"	,
	"state_url"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_role";
CREATE TABLE IF NOT EXISTS "ls_role" (
	"role_id"	,
	"role_name"	,
	"role_abbr"	
);
DROP TABLE IF EXISTS "ls_people";
CREATE TABLE IF NOT EXISTS "ls_people" (
	"people_id"	,
	"state_id"	,
	"role_id"	,
	"party_id"	,
	"name"	,
	"first_name"	,
	"middle_name"	,
	"last_name"	,
	"suffix"	,
	"nickname"	,
	"district"	,
	"committee_sponsor_id"	,
	"ballotpedia"	,
	"followthemoney_eid"	,
	"votesmart_id"	,
	"knowwho_pid"	,
	"opensecrets_id"	,
	"person_hash"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_session";
CREATE TABLE IF NOT EXISTS "ls_session" (
	"session_id"	,
	"state_id"	,
	"year_start"	,
	"year_end"	,
	"prefile"	,
	"sine_die"	,
	"prior"	,
	"special"	,
	"session_name"	,
	"session_title"	,
	"session_tag"	,
	"import_date"	,
	"import_hash"	
);
DROP TABLE IF EXISTS "ls_bill_calendar";
CREATE TABLE IF NOT EXISTS "ls_bill_calendar" (
	"bill_id"	,
	"event_hash"	,
	"event_type_id"	,
	"event_date"	,
	"event_time"	,
	"event_location"	,
	"event_desc"	,
	"updated"	,
	"created"	
);
DROP TABLE IF EXISTS "ls_bill_subject";
CREATE TABLE IF NOT EXISTS "ls_bill_subject" (
	"bill_id"	,
	"subject_id"	
);
DROP TABLE IF EXISTS "ls_bill_sast";
CREATE TABLE IF NOT EXISTS "ls_bill_sast" (
	"bill_id"	,
	"sast_type_id"	,
	"sast_bill_id"	,
	"sast_bill_number"	
);
DROP TABLE IF EXISTS "ls_stance";
CREATE TABLE IF NOT EXISTS "ls_stance" (
	"stance"	,
	"stance_desc"	
);
INSERT INTO "ls_bill_progress" VALUES ('1395419','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395419','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395419','3','2021-03-29','2');
INSERT INTO "ls_bill_progress" VALUES ('1395419','4','2021-04-06','3');
INSERT INTO "ls_bill_progress" VALUES ('1395419','5','2021-04-12','4');
INSERT INTO "ls_bill_progress" VALUES ('1395419','6','2021-04-20','4');
INSERT INTO "ls_bill_progress" VALUES ('1395421','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395421','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395421','3','2021-04-21','2');
INSERT INTO "ls_bill_progress" VALUES ('1395421','4','2021-04-28','3');
INSERT INTO "ls_bill_progress" VALUES ('1395421','5','2021-05-19','4');
INSERT INTO "ls_bill_progress" VALUES ('1395421','6','2021-05-26','4');
INSERT INTO "ls_bill_progress" VALUES ('1395422','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395422','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395422','3','2021-03-09','2');
INSERT INTO "ls_bill_progress" VALUES ('1395422','4','2021-03-22','3');
INSERT INTO "ls_bill_progress" VALUES ('1395422','5','2021-03-25','4');
INSERT INTO "ls_bill_progress" VALUES ('1395422','6','2021-03-31','4');
INSERT INTO "ls_bill_progress" VALUES ('1395423','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395423','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395423','3','2021-04-26','2');
INSERT INTO "ls_bill_progress" VALUES ('1395423','4','2021-05-12','3');
INSERT INTO "ls_bill_progress" VALUES ('1395423','5','2021-05-20','4');
INSERT INTO "ls_bill_progress" VALUES ('1395423','6','2021-05-26','4');
INSERT INTO "ls_bill_progress" VALUES ('1395425','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395425','2','2021-02-09','2');
INSERT INTO "ls_bill_progress" VALUES ('1395425','3','2021-02-23','3');
INSERT INTO "ls_bill_progress" VALUES ('1395425','4','2021-03-11','4');
INSERT INTO "ls_bill_progress" VALUES ('1395425','5','2021-03-17','4');
INSERT INTO "ls_bill_progress" VALUES ('1395426','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395426','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395426','3','2021-02-16','2');
INSERT INTO "ls_bill_progress" VALUES ('1395426','4','2021-03-22','3');
INSERT INTO "ls_bill_progress" VALUES ('1395426','5','2021-04-01','4');
INSERT INTO "ls_bill_progress" VALUES ('1395426','6','2021-04-07','4');
INSERT INTO "ls_bill_progress" VALUES ('1395427','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395427','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395427','3','2021-02-16','2');
INSERT INTO "ls_bill_progress" VALUES ('1395427','4','2021-03-02','3');
INSERT INTO "ls_bill_progress" VALUES ('1395427','5','2021-03-11','4');
INSERT INTO "ls_bill_progress" VALUES ('1395427','6','2021-03-17','4');
INSERT INTO "ls_bill_progress" VALUES ('1395429','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395429','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395431','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395431','2','2021-01-12','9');
INSERT INTO "ls_bill_progress" VALUES ('1395433','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395433','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395436','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395436','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395438','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395438','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395440','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395440','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395442','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395442','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395443','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395443','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395443','3','2021-03-02','2');
INSERT INTO "ls_bill_progress" VALUES ('1395443','4','2021-03-10','3');
INSERT INTO "ls_bill_progress" VALUES ('1395443','5','2021-03-25','4');
INSERT INTO "ls_bill_progress" VALUES ('1395443','6','2021-03-31','4');
INSERT INTO "ls_bill_progress" VALUES ('1395444','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395444','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395444','3','2022-02-28','2');
INSERT INTO "ls_bill_progress" VALUES ('1395444','4','2022-03-31','3');
INSERT INTO "ls_bill_progress" VALUES ('1395444','5','2022-04-12','4');
INSERT INTO "ls_bill_progress" VALUES ('1395444','6','2022-04-20','4');
INSERT INTO "ls_bill_progress" VALUES ('1395448','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395448','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395448','3','2021-05-04','2');
INSERT INTO "ls_bill_progress" VALUES ('1395448','4','2021-05-10','3');
INSERT INTO "ls_bill_progress" VALUES ('1395448','5','2021-05-19','4');
INSERT INTO "ls_bill_progress" VALUES ('1395448','6','2021-05-21','4');
INSERT INTO "ls_bill_progress" VALUES ('1395450','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395450','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395450','3','2021-04-12','2');
INSERT INTO "ls_bill_progress" VALUES ('1395450','4','2021-04-20','3');
INSERT INTO "ls_bill_progress" VALUES ('1395450','5','2021-04-29','4');
INSERT INTO "ls_bill_progress" VALUES ('1395450','6','2021-05-05','4');
INSERT INTO "ls_bill_progress" VALUES ('1395452','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395452','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395453','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395453','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395453','3','2021-02-16','2');
INSERT INTO "ls_bill_progress" VALUES ('1395453','4','2021-03-10','3');
INSERT INTO "ls_bill_progress" VALUES ('1395453','5','2021-03-25','4');
INSERT INTO "ls_bill_progress" VALUES ('1395453','6','2021-03-31','4');
INSERT INTO "ls_bill_progress" VALUES ('1395457','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395457','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395457','3','2022-02-28','2');
INSERT INTO "ls_bill_progress" VALUES ('1395457','4','2022-03-31','3');
INSERT INTO "ls_bill_progress" VALUES ('1395457','5','2022-04-12','4');
INSERT INTO "ls_bill_progress" VALUES ('1395457','6','2022-04-20','4');
INSERT INTO "ls_bill_progress" VALUES ('1395458','1','2021-01-07','1');
INSERT INTO "ls_bill_progress" VALUES ('1395458','2','2021-01-11','9');
INSERT INTO "ls_bill_progress" VALUES ('1395458','3','2021-02-16','2');
INSERT INTO "ls_bill_progress" VALUES ('1395458','4','2021-03-02','3');
INSERT INTO "ls_bill_progress" VALUES ('1395458','5','2021-03-11','4');
INSERT INTO "ls_bill_progress" VALUES ('1395458','6','2021-03-17','4');
INSERT INTO "ls_bill_progress" VALUES ('1395460','1','2021-01-07','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','6930','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','6931','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','6948','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16611','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16612','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16685','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16686','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16687','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16741','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16742','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16829','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16830','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','16831','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','17047','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18369','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18370','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18410','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18503','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18504','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18505','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18553','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18554','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18555','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18556','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18558','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18637','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18638','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18639','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18640','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','18982','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','19282','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','19683','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20431','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20432','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20433','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20434','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20435','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20537','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20568','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20613','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20799','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20820','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','20936','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22130','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22137','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22138','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22260','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22282','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989353','22355','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','6930','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','6931','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','6948','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16611','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16612','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16685','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16686','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16687','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16741','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16742','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16829','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16830','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','16831','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','17047','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18369','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18370','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18410','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18503','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18504','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18505','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18553','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18554','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18555','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18556','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18558','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18637','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18638','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18639','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18640','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','18982','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','19282','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','19683','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20431','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20432','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20433','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20434','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20435','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20537','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20568','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20613','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20799','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20820','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','20936','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22130','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22137','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22138','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22260','4');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22282','1');
INSERT INTO "ls_bill_vote_detail" VALUES ('989573','22355','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989577','6930','3');
INSERT INTO "ls_bill_vote_detail" VALUES ('989577','6931','1');
INSERT INTO "ls_reason" VALUES ('1','NewBill');
INSERT INTO "ls_reason" VALUES ('2','StatusChange');
INSERT INTO "ls_reason" VALUES ('3','Chamber');
INSERT INTO "ls_reason" VALUES ('4','Complete');
INSERT INTO "ls_reason" VALUES ('5','Title');
INSERT INTO "ls_reason" VALUES ('6','Description');
INSERT INTO "ls_reason" VALUES ('7','CommRefer');
INSERT INTO "ls_reason" VALUES ('8','CommReport');
INSERT INTO "ls_reason" VALUES ('9','SponsorAdd');
INSERT INTO "ls_reason" VALUES ('10','SponsorRemove');
INSERT INTO "ls_reason" VALUES ('11','SponsorChange');
INSERT INTO "ls_reason" VALUES ('12','HistoryAdd');
INSERT INTO "ls_reason" VALUES ('13','HistoryRemove');
INSERT INTO "ls_reason" VALUES ('14','HistoryRevised');
INSERT INTO "ls_reason" VALUES ('15','HistoryMajor');
INSERT INTO "ls_reason" VALUES ('16','HistoryMinor');
INSERT INTO "ls_reason" VALUES ('17','SubjectAdd');
INSERT INTO "ls_reason" VALUES ('18','SubjectRemove');
INSERT INTO "ls_reason" VALUES ('19','SAST');
INSERT INTO "ls_reason" VALUES ('20','Text');
INSERT INTO "ls_reason" VALUES ('21','Amendment');
INSERT INTO "ls_reason" VALUES ('22','Supplement');
INSERT INTO "ls_reason" VALUES ('23','Vote');
INSERT INTO "ls_reason" VALUES ('24','Calendar');
INSERT INTO "ls_reason" VALUES ('25','Progress');
INSERT INTO "ls_reason" VALUES ('26','VoteUpdate');
INSERT INTO "ls_reason" VALUES ('27','TextUpdate');
INSERT INTO "ls_reason" VALUES ('99','ICBM');
INSERT INTO "ls_mime_type" VALUES ('1','text/html','html','0');
INSERT INTO "ls_mime_type" VALUES ('2','application/pdf','pdf','1');
INSERT INTO "ls_mime_type" VALUES ('3','application/wordperfect','wpd','1');
INSERT INTO "ls_mime_type" VALUES ('4','application/msword','doc','1');
INSERT INTO "ls_mime_type" VALUES ('5','application/rtf','rtf','1');
INSERT INTO "ls_mime_type" VALUES ('6','application/vnd.openxmlformats-officedocument.wordprocessingml.document','docx','1');
INSERT INTO "ls_mime_type" VALUES ('7','application/vnd.ms-excel','xls','1');
INSERT INTO "ls_mime_type" VALUES ('8','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','xlsx','1');
INSERT INTO "ls_mime_type" VALUES ('9','text/csv','csv','0');
INSERT INTO "ls_mime_type" VALUES ('10','application/json','json','0');
INSERT INTO "ls_mime_type" VALUES ('11','application/zip','zip','1');
INSERT INTO "ls_body" VALUES ('1','48','1','H','House','House of Delegates','Del','Delegate');
INSERT INTO "ls_body" VALUES ('2','48','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('3','38','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('4','38','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('5','35','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('6','35','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('7','46','1','H','House','House of Delegates','Del','Delegate');
INSERT INTO "ls_body" VALUES ('8','46','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('11','1','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('12','1','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('13','2','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('14','2','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('15','3','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('16','3','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('17','4','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('18','4','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('19','5','1','A','Assembly','State Assembly','Asm','Assemblymember');
INSERT INTO "ls_body" VALUES ('20','5','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('21','6','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('22','6','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('23','7','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('24','7','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('25','8','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('26','8','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('27','9','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('28','9','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('29','10','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('30','10','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('31','11','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('32','11','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('33','12','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('34','12','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('35','13','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('36','13','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('37','14','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('38','14','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('39','15','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('40','15','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('41','16','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('42','16','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('43','17','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('44','17','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('45','18','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('46','18','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('47','19','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('48','19','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('49','20','1','H','House','House of Delegates','Del','Delegate');
INSERT INTO "ls_body" VALUES ('50','20','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('51','21','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('52','21','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('53','22','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('54','22','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('55','23','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('56','23','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('57','24','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('58','24','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('59','25','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('60','25','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('61','26','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('62','26','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('64','27','2','L','Legislature','Legislature','Sen','Senator');
INSERT INTO "ls_body" VALUES ('65','28','1','A','Assembly','Assembly','Rep','Representative');
INSERT INTO "ls_body" VALUES ('66','28','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('67','29','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('68','29','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('69','30','1','A','Assembly','General Assembly','Rep','Representative');
INSERT INTO "ls_body" VALUES ('70','30','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('71','31','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('72','31','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('73','32','1','A','Assembly','Assembly','Asm','Assemblymember');
INSERT INTO "ls_body" VALUES ('74','32','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('75','33','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('76','33','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('77','34','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('78','34','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('79','36','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('80','36','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('81','37','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('82','37','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('83','39','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('84','39','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('85','40','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('86','40','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('87','41','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('88','41','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('89','42','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('90','42','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('91','43','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('92','43','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('93','44','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('94','44','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('95','45','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('96','45','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('97','47','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('98','47','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('99','49','1','A','House','State Assembly','Rep','Representative');
INSERT INTO "ls_body" VALUES ('100','49','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('101','50','1','H','House','House of Representatives','Rep','Representative');
INSERT INTO "ls_body" VALUES ('102','50','2','S','Senate','Senate','Sen','Senator');
INSERT INTO "ls_body" VALUES ('103','21','3','J','Joint','Joint Conference','Jnt','Joint');
INSERT INTO "ls_committee" VALUES ('1436','64','Agriculture');
INSERT INTO "ls_committee" VALUES ('1437','64','Appropriations');
INSERT INTO "ls_committee" VALUES ('1438','64','Banking, Commerce and Insurance');
INSERT INTO "ls_committee" VALUES ('1439','64','Business and Labor');
INSERT INTO "ls_committee" VALUES ('1440','64','Education');
INSERT INTO "ls_committee" VALUES ('1441','64','General Affairs');
INSERT INTO "ls_committee" VALUES ('1442','64','Government, Military and Veterans Affairs');
INSERT INTO "ls_committee" VALUES ('1443','64','Health and Human Services');
INSERT INTO "ls_committee" VALUES ('1444','64','Judiciary');
INSERT INTO "ls_committee" VALUES ('1445','64','Natural Resources');
INSERT INTO "ls_committee" VALUES ('1446','64','Nebraska Retirement Systems');
INSERT INTO "ls_committee" VALUES ('1447','64','Revenue');
INSERT INTO "ls_committee" VALUES ('1448','64','Transportation and Telecommunications');
INSERT INTO "ls_committee" VALUES ('1449','64','Urban Affairs');
INSERT INTO "ls_committee" VALUES ('2196','64','Executive Board');
INSERT INTO "ls_committee" VALUES ('3119','64','Redistricting');
INSERT INTO "ls_bill_amendment" VALUES ('86101','1404797','0','64','2','2021-01-15','Linehan AM6','Linehan AM6','27868','d3f7f65d8cee2e98e5a9ff8c43e40cda','0','','https://legiscan.com/NE/amendment/LB364/id/86101','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM6.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('86102','1404797','0','64','2','2021-01-15','Linehan AM5','Linehan AM5','27969','c21b19280c6cb30323b96746d7396415','0','','https://legiscan.com/NE/amendment/LB364/id/86102','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM5.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('86189','1398564','0','64','2','2021-01-19','Hunt MO1','Hunt MO1','26170','ae831d3e8d7b580c9b33ab70c5a8fc47','0','','https://legiscan.com/NE/amendment/LB232/id/86189','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO1.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('86273','1396746','0','64','2','2021-01-21','Hansen, M. MO3','Hansen, M. MO3','26522','5b295446a6dc46c87f1a137564ddcea9','0','','https://legiscan.com/NE/amendment/LB170/id/86273','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO3.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('86296','1413301','0','64','2','2021-01-21','Linehan MO2','Linehan MO2','26502','f4d25e1eb563c43c96bf3939656d91f2','0','','https://legiscan.com/NE/amendment/LB678/id/86296','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO2.pdf','2022-09-21 02:22:09','2022-09-21 02:22:09');
INSERT INTO "ls_bill_amendment" VALUES ('86356','1395419','0','64','2','2021-01-22','Wayne AM15','Wayne AM15','28148','7d3d2dbfdd7ad170900d57027d078647','0','','https://legiscan.com/NE/amendment/LB70/id/86356','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM15.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('86638','1411233','0','64','2','2021-01-27','Lindstrom MO4','Lindstrom MO4','27337','77cf0c6ef4a0498bccbce2f72de4b117','0','','https://legiscan.com/NE/amendment/LB586/id/86638','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO4.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('86726','1402784','0','64','2','2021-01-27','Banking, Commerce and Insurance AM30','Banking, Commerce and Insurance AM30','28341','158dcade90078340997dc44fa8fedcb1','0','','https://legiscan.com/NE/amendment/LB297/id/86726','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM30.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_amendment" VALUES ('86765','1396732','0','64','2','2021-01-28','Urban Affairs AM9','Urban Affairs AM9','28566','b258c1ca1c3ca22e4be34527dccc56ec','0','','https://legiscan.com/NE/amendment/LB163/id/86765','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM9.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('86794','1395604','0','64','2','2021-01-28','Government, Military and Veterans Affairs AM21','Government, Military and Veterans Affairs AM21','28035','f7275b67e903deb36d10240b2db62a91','0','','https://legiscan.com/NE/amendment/LB4/id/86794','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM21.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('86847','1412356','1','64','2','2021-01-28','Hansen, B. MO6','Hansen, B. MO6','27585','7f7bd84793d01ed8bb3e27270cd76652','0','','https://legiscan.com/NE/amendment/LB598/id/86847','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO6.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('86903','1399584','0','64','2','2021-01-29','Brandt AM63','Brandt AM63','32618','62fa24f63e5357f2919d4909004e87e9','0','','https://legiscan.com/NE/amendment/LB242/id/86903','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM63.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('86927','1395505','0','64','2','2021-01-29','Lathrop MO7','Lathrop MO7','26063','3d338bd79cd5758f3b1790f6e1b670c4','0','','https://legiscan.com/NE/amendment/LB55/id/86927','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO7.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('86956','1412716','0','64','2','2021-01-28','Wayne MO5','Wayne MO5','27471','9ee0a9cfee1238b0255f36b1a097acd4','0','','https://legiscan.com/NE/amendment/LB656/id/86956','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO5.pdf','2022-09-21 02:22:09','2022-09-21 02:22:09');
INSERT INTO "ls_bill_amendment" VALUES ('86958','1404526','0','64','2','2021-02-01','Education AM41','Education AM41','36748','5cb6b9ac24be96cdac77cf38cbda447f','0','','https://legiscan.com/NE/amendment/LB323/id/86958','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM41.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('87555','1403300','0','64','2','2021-02-02','Transportation and Telecommunications AM49','Transportation and Telecommunications AM49','28512','761b74c4ac2204a73ec94f4c4e69a800','0','','https://legiscan.com/NE/amendment/LB302/id/87555','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM49.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_amendment" VALUES ('87807','1399049','0','64','2','2021-02-03','Hunt AM43','Hunt AM43','202589','3bc0c2c01e0195b7c3bf7f24e4a160bd','0','','https://legiscan.com/NE/amendment/LB250/id/87807','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM43.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('88143','1404068','0','64','2','2021-02-04','Banking, Commerce and Insurance AM112','Banking, Commerce and Insurance AM112','30246','5ac750ce679ab991c4c73d5b34d70e30','0','','https://legiscan.com/NE/amendment/LB337/id/88143','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM112.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('88217','1396834','0','64','2','2021-02-04','Natural Resources AM28','Natural Resources AM28','29176','b986fa9577a49e98b95424706c5e2f4c','0','','https://legiscan.com/NE/amendment/LB148/id/88217','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM28.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('88334','1395487','0','64','2','2021-02-08','Kolterman AM135','Kolterman AM135','30091','fb1be05e02f0cc7bb30cea3ce62edb23','0','','https://legiscan.com/NE/amendment/LB16/id/88334','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM135.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('88430','1412311','0','64','2','2021-02-08','Brandt AM148','Brandt AM148','28241','74775a5e60278a9360b7e4673940056a','0','','https://legiscan.com/NE/amendment/LB600/id/88430','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM148.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('88443','1404686','0','64','2','2021-02-08','Government, Military and Veterans Affairs AM67','Government, Military and Veterans Affairs AM67','28679','8c82a7020bb4bb683b1ebde43b3b0a38','0','','https://legiscan.com/NE/amendment/LB369/id/88443','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM67.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('88501','1405095','0','64','2','2021-02-08','Government, Military and Veterans Affairs AM66','Government, Military and Veterans Affairs AM66','29095','9912e984f8ece6a007690b52226a6350','0','','https://legiscan.com/NE/amendment/LB368/id/88501','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM66.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('88862','1406229','0','64','2','2021-02-09','Health and Human Services AM59','Health and Human Services AM59','27915','f0f5392db634c87552c684d138b4a512','0','','https://legiscan.com/NE/amendment/LB401/id/88862','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM59.pdf','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_bill_amendment" VALUES ('89212','1395774','0','64','2','2021-02-11','Agriculture AM197','Agriculture AM197','28743','67a21a29b9fe4544a6a3b150ed3854db','0','','https://legiscan.com/NE/amendment/LR5/id/89212','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM197.pdf','2022-09-21 02:22:18','2022-09-21 02:22:18');
INSERT INTO "ls_bill_amendment" VALUES ('89329','1395608','0','64','2','2021-02-11','Agriculture AM96','Agriculture AM96','32636','b044ab31fde798d1d0d353e3781427b8','0','','https://legiscan.com/NE/amendment/LB91/id/89329','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM96.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('89882','1396839','0','64','2','2021-02-16','Hunt AM163','Hunt AM163','49025','1f800974bae0348d2aa98538d8b762d2','0','','https://legiscan.com/NE/amendment/LB183/id/89882','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM163.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90000','1407993','0','64','2','2021-02-16','Judiciary AM198','Judiciary AM198','28165','571fef04a5b77fd827872c9d13a51242','0','','https://legiscan.com/NE/amendment/LB453/id/90000','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM198.pdf','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_amendment" VALUES ('90037','1395624','0','64','2','2021-02-16','Government, Military and Veterans Affairs AM127','Government, Military and Veterans Affairs AM127','31876','650cbbe6f51d3bbe0fbbe1d62cec9329','0','','https://legiscan.com/NE/amendment/LB83/id/90037','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM127.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('90080','1410291','0','64','2','2021-02-16','Judiciary AM132','Judiciary AM132','31086','2cbaeeb4d8a341d3ac6f5d9fef03eefe','0','','https://legiscan.com/NE/amendment/LB497/id/90080','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM132.pdf','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_amendment" VALUES ('90125','1404757','0','64','2','2021-02-16','Judiciary AM108','Judiciary AM108','27848','7903fa079a4ae945d67196aef0e7319f','0','','https://legiscan.com/NE/amendment/LB372/id/90125','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM108.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('90127','1399521','0','64','2','2021-02-16','Judiciary AM166','Judiciary AM166','40609','516365da65db14cd1962b5cbd021607b','0','','https://legiscan.com/NE/amendment/LB245/id/90127','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM166.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('90128','1395617','0','64','2','2021-02-16','Judiciary AM64','Judiciary AM64','28647','769f2d09c30a42adbf124b0976150092','0','','https://legiscan.com/NE/amendment/LB47/id/90128','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM64.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('90129','1396777','0','64','2','2021-02-16','Judiciary AM69','Judiciary AM69','36018','bff41556e2d1a6c490b3daa111e5a51e','0','','https://legiscan.com/NE/amendment/LB155/id/90129','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM69.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90185','1396153','0','64','2','2021-02-16','Albrecht AM226','Albrecht AM226','28867','49e17a32d48754fab3306361d1a94cdc','0','','https://legiscan.com/NE/amendment/LB113/id/90185','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM226.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_amendment" VALUES ('90223','1410277','0','64','2','2021-02-17','Cavanaugh, J. AM175','Cavanaugh, J. AM175','36996','4e51c582b1611012960c0fa8460b04c2','0','','https://legiscan.com/NE/amendment/LB504/id/90223','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM175.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('90259','1399584','0','64','2','2021-02-17','Government, Military and Veterans Affairs AM233','Government, Military and Veterans Affairs AM233','32823','16062a956f8fa9fecf41cb6f6906107f','0','','https://legiscan.com/NE/amendment/LB242/id/90259','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM233.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('90345','1399049','0','64','2','2021-02-17','Government, Military and Veterans Affairs AM232','Government, Military and Veterans Affairs AM232','202706','66cd26f922a7e31bbb9d40bbb5577954','0','','https://legiscan.com/NE/amendment/LB250/id/90345','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM232.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('90394','1412798','0','64','2','2021-02-17','Transportation and Telecommunications AM107','Transportation and Telecommunications AM107','27944','ddafe791da9b9a77eb010cce7e12a145','0','','https://legiscan.com/NE/amendment/LB616/id/90394','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM107.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('90459','1408284','0','64','2','2021-02-17','Cavanaugh, J. AM205','Cavanaugh, J. AM205','32757','4467c1c70ccfdc1a8e0305eff0615f55','0','','https://legiscan.com/NE/amendment/LB484/id/90459','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM205.pdf','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_amendment" VALUES ('90465','1413038','0','64','2','2021-02-18','Business and Labor AM120','Business and Labor AM120','38817','803e38136a47b0ba0c0639576d3eb94b','0','','https://legiscan.com/NE/amendment/LB660/id/90465','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM120.pdf','2022-09-21 02:22:09','2022-09-21 02:22:09');
INSERT INTO "ls_bill_amendment" VALUES ('90490','1396749','0','64','2','2021-02-18','Urban Affairs AM153','Urban Affairs AM153','30392','fa84589ea02a143d4fee083bc78ba26f','0','','https://legiscan.com/NE/amendment/LB162/id/90490','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM153.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90495','1395606','0','64','2','2021-02-18','Urban Affairs AM231','Urban Affairs AM231','30480','6917b303b07963827e118465055ef655','0','','https://legiscan.com/NE/amendment/LB9/id/90495','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM231.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('90501','1410070','0','64','2','2021-02-18','Banking, Commerce and Insurance AM160','Banking, Commerce and Insurance AM160','27885','a65c5a9c4f8fbb09f2837d19c34ffb43','0','','https://legiscan.com/NE/amendment/LB487/id/90501','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM160.pdf','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_amendment" VALUES ('90575','1396855','0','64','2','2021-02-18','Urban Affairs AM223','Urban Affairs AM223','74829','60be268443232fa0454b329695966ba2','0','','https://legiscan.com/NE/amendment/LB156/id/90575','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM223.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90721','1404641','0','64','2','2021-02-18','Urban Affairs AM118','Urban Affairs AM118','28465','f55d01e0e302126f4bd2eb1af19e254f','0','','https://legiscan.com/NE/amendment/LB332/id/90721','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM118.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('90751','1406165','0','64','2','2021-02-19','Health and Human Services AM200','Health and Human Services AM200','28879','b75289c5719ce02b9b7a1104c31fc2aa','0','','https://legiscan.com/NE/amendment/LB400/id/90751','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM200.pdf','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_amendment" VALUES ('90752','1411314','0','64','2','2021-02-19','Brandt AM284','Brandt AM284','47385','efa3e3559c130f8baad14c3cac82c708','0','','https://legiscan.com/NE/amendment/LB543/id/90752','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM284.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('90753','1396832','0','64','2','2021-02-19','Kolterman AM219','Kolterman AM219','52806','cb690ccd7687c29417ace4637368f146','0','','https://legiscan.com/NE/amendment/LB145/id/90753','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM219.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90756','1396754','0','64','2','2021-02-19','Stinner AM260','Stinner AM260','28281','882406c1dddae946f24599b60fd50d26','0','','https://legiscan.com/NE/amendment/LB141/id/90756','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM260.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('90778','1395426','0','64','2','2021-02-19','Enrollment and Review ER4','Enrollment and Review ER4','29648','d9ad05bed06660b8f59e66bd5c073598','0','','https://legiscan.com/NE/amendment/LB22/id/90778','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER4.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('90799','1395542','0','64','2','2021-02-19','Enrollment and Review ER2','Enrollment and Review ER2','28618','77b37fc882a27e96e0a1f1649ca57661','0','','https://legiscan.com/NE/amendment/LB23/id/90799','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER2.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('90803','1395453','0','64','2','2021-02-19','Williams AM263','Williams AM263','28174','dac5b78a788323d5bce81ea0a4e404ae','0','','https://legiscan.com/NE/amendment/LB66/id/90803','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM263.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('90826','1410405','0','64','2','2021-02-19','Kolterman AM229','Kolterman AM229','131097','49592aea37f0c97625e3681409373e77','0','','https://legiscan.com/NE/amendment/LB582/id/90826','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM229.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('90906','1395422','0','64','2','2021-02-19','Health and Human Services AM1','Health and Human Services AM1','30687','e7a0ba55d74cd3c155abeed9104dff52','0','','https://legiscan.com/NE/amendment/LB14/id/90906','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM1.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('90907','1396792','0','64','2','2021-02-19','Health and Human Services AM105','Health and Human Services AM105','28958','5119280474340c55da226c7dcae7a007','0','','https://legiscan.com/NE/amendment/LB143/id/90907','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM105.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91287','1399428','0','64','2','2021-02-23','Enrollment and Review ER3','Enrollment and Review ER3','28228','96993706e372876482d411960ded1178','0','','https://legiscan.com/NE/amendment/LB248/id/91287','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER3.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('91305','1395604','0','64','2','2021-02-23','Enrollment and Review ER7','Enrollment and Review ER7','27993','781fd87694e85d55b7ff8f955c7c26ba','0','','https://legiscan.com/NE/amendment/LB4/id/91305','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER7.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('91350','1404882','0','64','2','2021-02-23','Enrollment and Review ER8','Enrollment and Review ER8','28758','21adeabe7137acca51a4cb871c67612e','0','','https://legiscan.com/NE/amendment/LB363/id/91350','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER8.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('91363','1410119','0','64','2','2021-02-23','Natural Resources AM256','Natural Resources AM256','56641','3932b00826523340d972cbb8e424ba25','0','','https://legiscan.com/NE/amendment/LB507/id/91363','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM256.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('91404','1410751','0','64','2','2021-02-23','Education AM217','Education AM217','27996','330a8f9e838b03ea682274020083c4d5','0','','https://legiscan.com/NE/amendment/LB587/id/91404','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM217.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('91407','1404739','0','64','2','2021-02-23','Wayne MO8','Wayne MO8','26783','6288d38327631f5941cb6cd7a0375f83','0','','https://legiscan.com/NE/amendment/LB373/id/91407','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO8.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('91411','1396768','0','64','2','2021-02-23','Enrollment and Review ER6','Enrollment and Review ER6','28723','2f70e19462605b6811ccc6ae7f9d9eba','0','','https://legiscan.com/NE/amendment/LB159/id/91411','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER6.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91423','1396732','0','64','2','2021-02-23','Enrollment and Review ER1','Enrollment and Review ER1','30705','aebd87ec93f52cd938946a6dc4cb596a','0','','https://legiscan.com/NE/amendment/LB163/id/91423','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER1.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91451','1396742','0','64','2','2021-02-23','Kolterman AM295','Kolterman AM295','27911','831988549a683f0a7664f5c04fe86472','0','','https://legiscan.com/NE/amendment/LB147/id/91451','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM295.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91565','1396153','0','64','2','2021-02-24','Enrollment and Review ER9','Enrollment and Review ER9','28931','ce2f51d35cf6b01a724c2c48e0ba5112','0','','https://legiscan.com/NE/amendment/LB113/id/91565','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER9.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_amendment" VALUES ('91583','1410310','0','64','2','2021-02-24','Enrollment and Review ER16','Enrollment and Review ER16','29093','c6d733a0b1f252fe658742c3516c3261','0','','https://legiscan.com/NE/amendment/LB532/id/91583','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER16.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('91680','1398765','0','64','2','2021-02-24','Urban Affairs AM133','Urban Affairs AM133','38448','68f5f5764eb69e4ad236ad4f5837278c','0','','https://legiscan.com/NE/amendment/LB218/id/91680','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM133.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('91689','1396869','0','64','2','2021-02-24','Enrollment and Review ER10','Enrollment and Review ER10','28416','b04c9c97c9ad376025e0490909f51d00','0','','https://legiscan.com/NE/amendment/LB174/id/91689','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER10.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91716','1396765','0','64','2','2021-02-24','Enrollment and Review ER11','Enrollment and Review ER11','29240','5a0326b8c91269e182411606b5f857af','0','','https://legiscan.com/NE/amendment/LB149/id/91716','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER11.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91720','1410101','0','64','2','2021-02-24','Enrollment and Review ER14','Enrollment and Review ER14','28725','1d0a19f21be9fc7f75b4064e25c64ee4','0','','https://legiscan.com/NE/amendment/LB503/id/91720','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER14.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('91728','1396057','0','64','2','2021-02-24','Enrollment and Review ER5','Enrollment and Review ER5','28678','edc0a875a5ccadd6992303a6285ae7dd','0','','https://legiscan.com/NE/amendment/LB106/id/91728','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER5.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_amendment" VALUES ('91737','1396834','0','64','2','2021-02-24','Enrollment and Review ER12','Enrollment and Review ER12','29115','5b1f223113bb345b201c8b4b3c416a23','0','','https://legiscan.com/NE/amendment/LB148/id/91737','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER12.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91758','1404376','0','64','2','2021-02-24','Transportation and Telecommunications AM83','Transportation and Telecommunications AM83','28982','0761f5943ff32f7a2b0c2eee08c31aff','0','','https://legiscan.com/NE/amendment/LB344/id/91758','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM83.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('91770','1395419','0','64','2','2021-02-24','General Affairs AM276','General Affairs AM276','28566','3cca31b2b1c771e3bb1a16796c6358ca','0','','https://legiscan.com/NE/amendment/LB70/id/91770','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM276.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('91780','1404526','0','64','2','2021-02-24','Enrollment and Review ER15','Enrollment and Review ER15','28940','6510ef7a6f9c993204e5f083b956f526','0','','https://legiscan.com/NE/amendment/LB323/id/91780','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER15.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('91791','1451784','0','64','2','2021-02-24','Wayne MO9','Wayne MO9','26565','d61e39b04e8da9265e4d4ad33d094862','0','','https://legiscan.com/NE/amendment/LB106A/id/91791','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO9.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_amendment" VALUES ('91800','1403300','0','64','2','2021-02-24','Enrollment and Review ER13','Enrollment and Review ER13','27902','460273314e8cd1efb3b9db9d4033900f','0','','https://legiscan.com/NE/amendment/LB302/id/91800','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/ER13.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_amendment" VALUES ('91880','1403261','0','64','2','2021-02-24','General Affairs AM277','General Affairs AM277','29991','8f8175d889c4df0240225f534e5281e1','0','','https://legiscan.com/NE/amendment/LB312/id/91880','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM277.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_amendment" VALUES ('91949','1406211','0','64','2','2021-02-25','Revenue AM291','Revenue AM291','29283','b82219c7c859c4ae3756bae51bad472b','0','','https://legiscan.com/NE/amendment/LB387/id/91949','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM291.pdf','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_amendment" VALUES ('91988','1396732','0','64','2','2021-02-25','Wayne AM334','Wayne AM334','31362','34cf7275954b65e1baaa7ab4f3f9ff4d','0','','https://legiscan.com/NE/amendment/LB163/id/91988','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM334.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('91996','1404331','0','64','2','2021-02-25','Agriculture AM150','Agriculture AM150','32454','b17dbb197044fa83f3e8c21aaba041f2','0','','https://legiscan.com/NE/amendment/LB324/id/91996','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM150.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('92018','1410011','0','64','2','2021-02-25','Hunt AM333','Hunt AM333','30759','e50d78d87b14f9ba5d2b34ed93e86531','0','','https://legiscan.com/NE/amendment/LB517/id/92018','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM333.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('92107','1410380','0','64','2','2021-02-25','Wayne AM337','Wayne AM337','29203','a5793b7017a0ea66f758acd73ea95386','0','','https://legiscan.com/NE/amendment/LB489/id/92107','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM337.pdf','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_amendment" VALUES ('92145','1404526','0','64','2','2021-02-25','Linehan AM248','Linehan AM248','28026','49ae0349b74a4d69a3f6df78fc3704c3','0','','https://legiscan.com/NE/amendment/LB323/id/92145','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM248.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_amendment" VALUES ('92338','1395623','0','64','2','2021-02-26','Flood AM373','Flood AM373','47628','b5b8fb8df93838aea66be49728f7dea6','0','','https://legiscan.com/NE/amendment/LB39/id/92338','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM373.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_amendment" VALUES ('92343','1406148','0','64','2','2021-02-26','Bostelman AM339','Bostelman AM339','31118','d96f1494cc52660e1fb3e8451b9723f1','0','','https://legiscan.com/NE/amendment/LB398/id/92343','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM339.pdf','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_amendment" VALUES ('92355','1410119','0','64','2','2021-02-26','Cavanaugh, J. AM323','Cavanaugh, J. AM323','28639','85ae8097c83d35b30391902f9d2cd14a','0','','https://legiscan.com/NE/amendment/LB507/id/92355','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM323.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('92380','1398689','0','64','2','2021-02-26','Hunt AM358','Hunt AM358','28101','34004c4e9435cca8088a028fc701deed','0','','https://legiscan.com/NE/amendment/LB231/id/92380','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM358.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_amendment" VALUES ('92467','1396834','0','64','2','2021-02-26','Bostelman AM332','Bostelman AM332','80652','bfb0aff92b87ad3ddb34038115a8592b','0','','https://legiscan.com/NE/amendment/LB148/id/92467','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM332.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('92481','1396153','0','64','2','2021-02-26','Albrecht AM353','Albrecht AM353','28931','0ca00403c7e9906178e0ac0c02070d56','0','','https://legiscan.com/NE/amendment/LB113/id/92481','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM353.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_amendment" VALUES ('92661','1413248','0','64','2','2021-03-01','Government, Military and Veterans Affairs AM303','Government, Military and Veterans Affairs AM303','29776','ed9a917bdc5f9fe98fe106cb4b9f367d','0','','https://legiscan.com/NE/amendment/LB664/id/92661','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM303.pdf','2022-09-21 02:22:09','2022-09-21 02:22:09');
INSERT INTO "ls_bill_amendment" VALUES ('92678','1402772','0','64','2','2021-03-01','Government, Military and Veterans Affairs AM187','Government, Military and Veterans Affairs AM187','34738','df90eba01285b376c5773afb5f6c91eb','0','','https://legiscan.com/NE/amendment/LB275/id/92678','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM187.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_amendment" VALUES ('92701','1395444','0','64','2','2021-03-01','General Affairs AM341','General Affairs AM341','29503','93d5800e7c4d3d060adf0346088d48db','0','','https://legiscan.com/NE/amendment/LB75/id/92701','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM341.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_amendment" VALUES ('92952','1396739','0','64','2','2021-03-02','Revenue AM387','Revenue AM387','28729','c74bc308dc6a38218edceedcf74369f3','0','','https://legiscan.com/NE/amendment/LB178/id/92952','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM387.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_amendment" VALUES ('92982','1411259','0','64','2','2021-03-02','Health and Human Services AM116','Health and Human Services AM116','31167','ab68e7a67fdca71e81a1ec0a2a89f03a','0','','https://legiscan.com/NE/amendment/LB583/id/92982','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM116.pdf','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_amendment" VALUES ('92996','1406254','0','64','2','2021-03-02','Revenue AM371','Revenue AM371','56119','b626edf6e3bb5d5e670c12cf504d8b22','0','','https://legiscan.com/NE/amendment/LB408/id/92996','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM371.pdf','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_bill_amendment" VALUES ('93023','1410190','0','64','2','2021-03-02','Wayne MO11','Wayne MO11','26249','52344aac373a9363c4882c2fe0a35016','0','','https://legiscan.com/NE/amendment/LB510/id/93023','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO11.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('93024','1410190','0','64','2','2021-03-02','Wayne MO10','Wayne MO10','26799','7eee567d708e75e0dba3277c2a03c0bf','0','','https://legiscan.com/NE/amendment/LB510/id/93024','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/MO10.pdf','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_amendment" VALUES ('93041','1397324','0','64','2','2021-03-02','Education AM357','Education AM357','30990','eb3d6f0426abb79ee44457ea3c4a5b54','0','','https://legiscan.com/NE/amendment/LB210/id/93041','https://nebraskalegislature.gov/FloorDocs/107/PDF/AM/AM357.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_vote" VALUES ('1','Yea');
INSERT INTO "ls_vote" VALUES ('2','Nay');
INSERT INTO "ls_vote" VALUES ('3','Not Voting');
INSERT INTO "ls_vote" VALUES ('4','Absent');
INSERT INTO "ls_event_type" VALUES ('1','Hearing');
INSERT INTO "ls_event_type" VALUES ('2','Executive Session');
INSERT INTO "ls_event_type" VALUES ('3','Markup Session');
INSERT INTO "ls_bill_history" VALUES ('1395419','1','1','64','2021-01-07','Date of introduction');
INSERT INTO "ls_bill_history" VALUES ('1395419','2','1','64','2021-01-11','Referred to General Affairs Committee');
INSERT INTO "ls_bill_history" VALUES ('1395419','3','0','64','2021-01-15','Notice of hearing for January 25, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395419','4','0','64','2021-01-22','Wayne AM15 filed');
INSERT INTO "ls_bill_history" VALUES ('1395419','5','0','64','2021-02-24','Placed on General File with AM276');
INSERT INTO "ls_bill_history" VALUES ('1395419','6','0','64','2021-02-24','General Affairs AM276 filed');
INSERT INTO "ls_bill_history" VALUES ('1395419','7','0','64','2021-03-29','General Affairs AM276 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395419','8','0','64','2021-03-29','Wayne AM15 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395419','9','1','64','2021-03-29','Advanced to Enrollment and Review Initial');
INSERT INTO "ls_bill_history" VALUES ('1395419','10','0','64','2021-03-30','Placed on Select File');
INSERT INTO "ls_bill_history" VALUES ('1395419','11','1','64','2021-04-06','Advanced to Enrollment and Review for Engrossment');
INSERT INTO "ls_bill_history" VALUES ('1395419','12','0','64','2021-04-07','Placed on Final Reading');
INSERT INTO "ls_bill_history" VALUES ('1395419','13','0','64','2021-04-12','Passed on Final Reading 42-2-5');
INSERT INTO "ls_bill_history" VALUES ('1395419','14','1','64','2021-04-12','President/Speaker signed');
INSERT INTO "ls_bill_history" VALUES ('1395419','15','0','64','2021-04-12','Presented to Governor on April 12, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395419','16','1','64','2021-04-20','Approved by Governor on April 16, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395421','1','1','64','2021-01-07','Date of introduction');
INSERT INTO "ls_bill_history" VALUES ('1395421','2','1','64','2021-01-11','Referred to Revenue Committee');
INSERT INTO "ls_bill_history" VALUES ('1395421','3','0','64','2021-02-02','Notice of hearing for February 10, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395421','4','0','64','2021-03-12','Briese priority bill');
INSERT INTO "ls_bill_history" VALUES ('1395421','5','0','64','2021-03-17','Placed on General File with AM638');
INSERT INTO "ls_bill_history" VALUES ('1395421','6','0','64','2021-03-17','Revenue AM638 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','7','0','64','2021-04-01','Briese FA15 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','8','0','64','2021-04-06','Briese AM868 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','9','0','64','2021-04-20','Murman name added');
INSERT INTO "ls_bill_history" VALUES ('1395421','10','0','64','2021-04-20','Revenue AM638 pending');
INSERT INTO "ls_bill_history" VALUES ('1395421','11','0','64','2021-04-20','Briese AM868 pending');
INSERT INTO "ls_bill_history" VALUES ('1395421','12','0','64','2021-04-20','Briese FA15 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395421','13','0','64','2021-04-21','Briese AM868 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395421','14','0','64','2021-04-21','Briese FA27 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','15','0','64','2021-04-21','Briese FA27 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395421','16','0','64','2021-04-21','Revenue AM638 pending');
INSERT INTO "ls_bill_history" VALUES ('1395421','17','0','64','2021-04-21','Groene AM1063 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','18','0','64','2021-04-21','Groene AM1063 pending');
INSERT INTO "ls_bill_history" VALUES ('1395421','19','0','64','2021-04-21','Hansen, M. MO39 Bracket bill until June 10, 2021 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','20','0','64','2021-04-21','Hansen, M. MO39 failed');
INSERT INTO "ls_bill_history" VALUES ('1395421','21','0','64','2021-04-21','Groene AM1063 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395421','22','0','64','2021-04-21','Revenue AM638 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395421','23','1','64','2021-04-21','Advanced to Enrollment and Review Initial');
INSERT INTO "ls_bill_history" VALUES ('1395421','24','0','64','2021-04-23','Placed on Select File with ER66');
INSERT INTO "ls_bill_history" VALUES ('1395421','25','0','64','2021-04-23','Enrollment and Review ER66 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','26','0','64','2021-04-27','Briese AM1165 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','27','0','64','2021-04-28','Enrollment and Review ER66 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395421','28','0','64','2021-04-28','Briese AM1165 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395421','29','1','64','2021-04-28','Advanced to Enrollment and Review for Engrossment');
INSERT INTO "ls_bill_history" VALUES ('1395421','30','0','64','2021-05-04','Placed on Final Reading');
INSERT INTO "ls_bill_history" VALUES ('1395421','31','0','64','2021-05-19','Cavanaugh, M. AM1181 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','32','0','64','2021-05-19','Motion to return to Select File failed');
INSERT INTO "ls_bill_history" VALUES ('1395421','33','0','64','2021-05-19','Cavanaugh, M. AM1181 not considered');
INSERT INTO "ls_bill_history" VALUES ('1395421','34','0','64','2021-05-19','Cavanaugh, M. AM1093 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','35','0','64','2021-05-19','Motion to return to Select File failed');
INSERT INTO "ls_bill_history" VALUES ('1395421','36','0','64','2021-05-19','Cavanaugh, M. AM1093 not considered');
INSERT INTO "ls_bill_history" VALUES ('1395421','37','0','64','2021-05-19','Cavanaugh, M. MO83 Bracket until May 20, 2021 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','38','0','64','2021-05-19','Cavanaugh, M. MO83 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395421','39','0','64','2021-05-19','Cavanaugh, M. MO84 Bracket until May 21, 2021 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','40','0','64','2021-05-19','Cavanaugh, M. MO84 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395421','41','0','64','2021-05-19','Cavanaugh, M. MO85 Bracket until June 5, 2021 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','42','0','64','2021-05-19','Cavanaugh, M. MO85 withdrawn');
INSERT INTO "ls_bill_history" VALUES ('1395421','43','0','64','2021-05-19','Cavanaugh, M. MO86 Recommit to the Revenue Committee filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','44','0','64','2021-05-19','Cavanaugh, M. MO86 failed');
INSERT INTO "ls_bill_history" VALUES ('1395421','45','0','64','2021-05-19','Cavanaugh, M. MO87 Bracket until June 6, 2021 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','46','0','64','2021-05-19','Briese MO88 Invoke cloture pursuant to Rule 7, Sec. 10 filed');
INSERT INTO "ls_bill_history" VALUES ('1395421','47','0','64','2021-05-19','Briese MO88 prevailed');
INSERT INTO "ls_bill_history" VALUES ('1395421','48','0','64','2021-05-19','Cavanaugh, M. MO87 failed');
INSERT INTO "ls_bill_history" VALUES ('1395421','49','0','64','2021-05-19','Passed on Final Reading 36-6-7');
INSERT INTO "ls_bill_history" VALUES ('1395421','50','1','64','2021-05-19','President/Speaker signed');
INSERT INTO "ls_bill_history" VALUES ('1395421','51','0','64','2021-05-19','Presented to Governor on May 19, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395421','52','1','64','2021-05-26','Approved by Governor on May 24, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395422','1','1','64','2021-01-07','Date of introduction');
INSERT INTO "ls_bill_history" VALUES ('1395422','2','1','64','2021-01-11','Referred to Health and Human Services Committee');
INSERT INTO "ls_bill_history" VALUES ('1395422','3','0','64','2021-01-11','Hilkemann name added');
INSERT INTO "ls_bill_history" VALUES ('1395422','4','0','64','2021-01-12','Day name added');
INSERT INTO "ls_bill_history" VALUES ('1395422','5','0','64','2021-01-13','Murman name added');
INSERT INTO "ls_bill_history" VALUES ('1395422','6','0','64','2021-01-20','Notice of hearing for January 27, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395422','7','0','64','2021-02-19','Placed on General File with AM1');
INSERT INTO "ls_bill_history" VALUES ('1395422','8','0','64','2021-02-19','Health and Human Services AM1 filed');
INSERT INTO "ls_bill_history" VALUES ('1395422','9','0','64','2021-02-23','Blood priority bill');
INSERT INTO "ls_bill_history" VALUES ('1395422','10','0','64','2021-03-09','Health and Human Services AM1 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395422','11','1','64','2021-03-09','Advanced to Enrollment and Review Initial');
INSERT INTO "ls_bill_history" VALUES ('1395422','12','0','64','2021-03-09','Vargas name added');
INSERT INTO "ls_bill_history" VALUES ('1395422','13','0','64','2021-03-12','Placed on Select File with ER20');
INSERT INTO "ls_bill_history" VALUES ('1395422','14','0','64','2021-03-12','Enrollment and Review ER20 filed');
INSERT INTO "ls_bill_history" VALUES ('1395422','15','0','64','2021-03-22','Enrollment and Review ER20 adopted');
INSERT INTO "ls_bill_history" VALUES ('1395422','16','1','64','2021-03-22','Advanced to Enrollment and Review for Engrossment');
INSERT INTO "ls_bill_history" VALUES ('1395422','17','0','64','2021-03-23','Placed on Final Reading');
INSERT INTO "ls_bill_history" VALUES ('1395422','18','0','64','2021-03-25','Dispensing of reading at large approved');
INSERT INTO "ls_bill_history" VALUES ('1395422','19','0','64','2021-03-25','Passed on Final Reading 47-0-2');
INSERT INTO "ls_bill_history" VALUES ('1395422','20','1','64','2021-03-25','President/Speaker signed');
INSERT INTO "ls_bill_history" VALUES ('1395422','21','0','64','2021-03-25','Presented to Governor on March 25, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395422','22','0','64','2021-03-29','B. Hansen explanation of vote');
INSERT INTO "ls_bill_history" VALUES ('1395422','23','1','64','2021-03-31','Approved by Governor on March 31, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395423','1','1','64','2021-01-07','Date of introduction');
INSERT INTO "ls_bill_history" VALUES ('1395423','2','1','64','2021-01-11','Referred to Revenue Committee');
INSERT INTO "ls_bill_history" VALUES ('1395423','3','0','64','2021-02-09','Notice of hearing for February 26, 2021');
INSERT INTO "ls_bill_history" VALUES ('1395423','4','0','64','2021-03-10','Placed on General File');
INSERT INTO "ls_bill_history" VALUES ('1395423','5','0','64','2021-03-17','Speaker priority bill');
INSERT INTO "ls_bill_history" VALUES ('1395423','6','0','64','2021-03-17','Slama name added');
INSERT INTO "ls_bill_history" VALUES ('1395423','7','0','64','2021-04-23','Hansen, B. name added');
INSERT INTO "ls_bill_history" VALUES ('1395423','8','0','64','2021-04-26','Cavanaugh, M. MO47 Strike the enacting clause filed');
INSERT INTO "ls_bill_history" VALUES ('1395423','9','0','64','2021-04-26','Cavanaugh, M. MO47 withdrawn');
INSERT INTO "ls_supplement_type" VALUES ('1','Fiscal Note');
INSERT INTO "ls_supplement_type" VALUES ('2','Analysis');
INSERT INTO "ls_supplement_type" VALUES ('3','Fiscal Note/Analysis');
INSERT INTO "ls_supplement_type" VALUES ('4','Vote Image');
INSERT INTO "ls_supplement_type" VALUES ('5','Local Mandate');
INSERT INTO "ls_supplement_type" VALUES ('6','Corrections Impact');
INSERT INTO "ls_supplement_type" VALUES ('7','Misc');
INSERT INTO "ls_supplement_type" VALUES ('8','Veto Letter');
INSERT INTO "ls_bill_vote" VALUES ('989353','1398564','64','2021-01-21','Hunt MO1 prevailed','38','0','7','4','49','1','https://legiscan.com/NE/rollcall/LB232/id/989353','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6093','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('989573','1413301','64','2021-01-22','Linehan MO2 prevailed','31','0','5','13','49','1','https://legiscan.com/NE/rollcall/LB678/id/989573','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6104','2022-09-21 02:22:09','2022-09-21 02:22:09');
INSERT INTO "ls_bill_vote" VALUES ('989577','1396746','64','2021-01-22','Hansen, M. MO3 prevailed','30','0','6','13','49','1','https://legiscan.com/NE/rollcall/LB170/id/989577','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6105','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('992493','1395900','64','2021-01-29','Adopted','33','0','1','15','49','1','https://legiscan.com/NE/rollcall/LR1/id/992493','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6113','2022-09-21 02:22:18','2022-09-21 02:22:18');
INSERT INTO "ls_bill_vote" VALUES ('992496','1411233','64','2021-01-29','Lindstrom MO4 prevailed','31','0','2','16','49','1','https://legiscan.com/NE/rollcall/LB586/id/992496','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6111','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_vote" VALUES ('992572','1412356','64','2021-01-29','Hansen, B. MO6 prevailed','32','0','2','15','49','1','https://legiscan.com/NE/rollcall/LB598/id/992572','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6112','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_bill_vote" VALUES ('999151','1395425','64','2021-02-09','Advanced to Enrollment and Review Initial','34','0','4','11','49','1','https://legiscan.com/NE/rollcall/LB1/id/999151','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6124','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_vote" VALUES ('1003059','1402680','64','2021-02-10','Advanced to Enrollment and Review Initial','41','0','2','6','49','1','https://legiscan.com/NE/rollcall/LB288/id/1003059','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6126','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1006429','1395604','64','2021-02-16','Government, Military and Veterans Affairs AM21 adopted','40','0','5','4','49','1','https://legiscan.com/NE/rollcall/LB4/id/1006429','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6145','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1006430','1395604','64','2021-02-16','Advanced to Enrollment and Review Initial','42','0','4','3','49','1','https://legiscan.com/NE/rollcall/LB4/id/1006430','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6146','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1006431','1404526','64','2021-02-16','Education AM41 adopted','34','0','12','3','49','1','https://legiscan.com/NE/rollcall/LB323/id/1006431','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6147','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1006432','1404526','64','2021-02-16','Advanced to Enrollment and Review Initial','29','5','12','3','49','1','https://legiscan.com/NE/rollcall/LB323/id/1006432','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6148','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1006433','1395426','64','2021-02-16','Advanced to Enrollment and Review Initial','38','0','5','6','49','1','https://legiscan.com/NE/rollcall/LB22/id/1006433','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6133','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1006437','1396834','64','2021-02-16','Natural Resources AM28 adopted','35','0','10','4','49','1','https://legiscan.com/NE/rollcall/LB148/id/1006437','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6155','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1006438','1396834','64','2021-02-16','Advanced to Enrollment and Review Initial','40','0','6','3','49','1','https://legiscan.com/NE/rollcall/LB148/id/1006438','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6156','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1006469','1404882','64','2021-02-16','Advanced to Enrollment and Review Initial','40','0','4','5','49','1','https://legiscan.com/NE/rollcall/LB363/id/1006469','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6138','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1006471','1395517','64','2021-02-16','Advanced to Enrollment and Review Initial','42','0','1','6','49','1','https://legiscan.com/NE/rollcall/LB77/id/1006471','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6136','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1006498','1410101','64','2021-02-16','Advanced to Enrollment and Review Initial','38','0','8','3','49','1','https://legiscan.com/NE/rollcall/LB503/id/1006498','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6158','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1006520','1395427','64','2021-02-16','Advanced to Enrollment and Review Initial','34','7','4','4','49','1','https://legiscan.com/NE/rollcall/LB44/id/1006520','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6141','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1006563','1399134','64','2021-02-16','Advanced to Enrollment and Review Initial','42','0','4','3','49','1','https://legiscan.com/NE/rollcall/LB253/id/1006563','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6157','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1006569','1395542','64','2021-02-16','Advanced to Enrollment and Review Initial','38','0','5','6','49','1','https://legiscan.com/NE/rollcall/LB23/id/1006569','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6134','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1006594','1396869','64','2021-02-16','Advanced to Enrollment and Review Initial','33','0','10','6','49','1','https://legiscan.com/NE/rollcall/LB174/id/1006594','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6152','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1006641','1399428','64','2021-02-16','Advanced to Enrollment and Review Initial','40','0','4','5','49','1','https://legiscan.com/NE/rollcall/LB248/id/1006641','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6137','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1006664','1403300','64','2021-02-16','Transportation and Telecommunications AM49 adopted','35','0','8','6','49','1','https://legiscan.com/NE/rollcall/LB302/id/1006664','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6153','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1006665','1403300','64','2021-02-16','Advanced to Enrollment and Review Initial','40','0','5','4','49','1','https://legiscan.com/NE/rollcall/LB302/id/1006665','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6154','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1006772','1396732','64','2021-02-16','Urban Affairs AM9 adopted','44','0','1','4','49','1','https://legiscan.com/NE/rollcall/LB163/id/1006772','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6143','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1006773','1396732','64','2021-02-16','Advanced to Enrollment and Review Initial','44','0','1','4','49','1','https://legiscan.com/NE/rollcall/LB163/id/1006773','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6144','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1006783','1404739','64','2021-02-16','Advanced to Enrollment and Review Initial','41','0','3','5','49','1','https://legiscan.com/NE/rollcall/LB373/id/1006783','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6139','2022-09-21 02:22:04','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1006969','1396765','64','2021-02-16','Advanced to Enrollment and Review Initial','36','0','7','6','49','1','https://legiscan.com/NE/rollcall/LB149/id/1006969','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6151','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1007024','1395458','64','2021-02-16','Advanced to Enrollment and Review Initial','39','0','5','5','49','1','https://legiscan.com/NE/rollcall/LB25/id/1007024','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6140','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1007031','1395545','64','2021-02-16','Advanced to Enrollment and Review Initial','35','0','4','10','49','1','https://legiscan.com/NE/rollcall/LB21/id/1007031','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6132','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1007082','1395453','64','2021-02-16','Advanced to Enrollment and Review Initial','34','0','9','6','49','1','https://legiscan.com/NE/rollcall/LB66/id/1007082','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6135','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1007100','1396768','64','2021-02-16','Advanced to Enrollment and Review Initial','39','0','6','4','49','1','https://legiscan.com/NE/rollcall/LB159/id/1007100','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6142','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1007128','1396057','64','2021-02-16','Advanced to Enrollment and Review Initial','26','1','16','6','49','1','https://legiscan.com/NE/rollcall/LB106/id/1007128','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6149','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1007502','1410310','64','2021-02-16','Advanced to Enrollment and Review Initial','37','0','7','5','49','1','https://legiscan.com/NE/rollcall/LB532/id/1007502','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6159','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1007503','1396153','64','2021-02-16','Advanced to Enrollment and Review Initial','34','1','8','6','49','1','https://legiscan.com/NE/rollcall/LB113/id/1007503','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6150','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1016726','1455129','64','2021-02-26','Advanced to Enrollment and Review Initial','40','0','4','5','49','1','https://legiscan.com/NE/rollcall/LB113A/id/1016726','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6168','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1016732','1451784','64','2021-02-26','Advanced to Enrollment and Review Initial','39','0','5','5','49','1','https://legiscan.com/NE/rollcall/LB106A/id/1016732','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6167','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1019097','1396881','64','2021-03-02','Advanced to Enrollment and Review Initial','40','0','4','5','49','1','https://legiscan.com/NE/rollcall/LB177/id/1019097','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6173','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1019253','1402784','64','2021-03-02','Banking, Commerce and Insurance AM30 adopted','40','0','4','5','49','1','https://legiscan.com/NE/rollcall/LB297/id/1019253','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6171','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1019254','1402784','64','2021-03-02','Advanced to Enrollment and Review Initial','38','0','6','5','49','1','https://legiscan.com/NE/rollcall/LB297/id/1019254','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6172','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1019256','1395443','64','2021-03-02','Advanced to Enrollment and Review Initial','45','0','1','3','49','1','https://legiscan.com/NE/rollcall/LB94/id/1019256','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6183','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1019276','1410190','64','2021-03-02','Wayne MO10 failed','11','28','8','2','49','0','https://legiscan.com/NE/rollcall/LB510/id/1019276','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6177','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1019277','1410190','64','2021-03-02','Advanced to Enrollment and Review Initial','27','9','11','2','49','1','https://legiscan.com/NE/rollcall/LB510/id/1019277','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6178','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1019517','1404068','64','2021-03-02','Banking, Commerce and Insurance AM112 adopted','41','0','6','2','49','1','https://legiscan.com/NE/rollcall/LB337/id/1019517','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6179','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1019518','1404068','64','2021-03-02','Advanced to Enrollment and Review Initial','43','0','4','2','49','1','https://legiscan.com/NE/rollcall/LB337/id/1019518','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6180','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1019643','1410252','64','2021-03-02','Advanced to Enrollment and Review Initial','38','0','7','4','49','1','https://legiscan.com/NE/rollcall/LB509/id/1019643','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6174','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1020260','1395470','64','2021-03-02','Advanced to Enrollment and Review Initial','44','0','2','3','49','1','https://legiscan.com/NE/rollcall/LB93/id/1020260','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6182','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1020284','1395550','64','2021-03-02','Advanced to Enrollment and Review Initial','44','0','2','3','49','1','https://legiscan.com/NE/rollcall/LB35/id/1020284','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6181','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1024347','1406165','64','2021-03-09','Health and Human Services AM200 adopted','46','0','1','2','49','1','https://legiscan.com/NE/rollcall/LB400/id/1024347','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6192','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_vote" VALUES ('1024348','1406165','64','2021-03-09','Advanced to Enrollment and Review Initial','46','0','1','2','49','1','https://legiscan.com/NE/rollcall/LB400/id/1024348','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6193','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_vote" VALUES ('1024378','1395422','64','2021-03-09','Health and Human Services AM1 adopted','41','0','3','5','49','1','https://legiscan.com/NE/rollcall/LB14/id/1024378','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6190','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1024379','1395422','64','2021-03-09','Advanced to Enrollment and Review Initial','43','0','1','5','49','1','https://legiscan.com/NE/rollcall/LB14/id/1024379','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6191','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1024414','1402516','64','2021-03-09','Hilkemann FA4 lost','2','17','27','3','49','0','https://legiscan.com/NE/rollcall/LB274/id/1024414','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6195','2022-09-21 02:22:02','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1024415','1402516','64','2021-03-09','Hilkemann MO12 failed','2','20','24','3','49','0','https://legiscan.com/NE/rollcall/LB274/id/1024415','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6196','2022-09-21 02:22:02','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1024416','1402516','64','2021-03-09','General Affairs AM427 adopted','30','1','15','3','49','1','https://legiscan.com/NE/rollcall/LB274/id/1024416','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6197','2022-09-21 02:22:02','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1024417','1402516','64','2021-03-09','Advanced to Enrollment and Review Initial','33','0','13','3','49','1','https://legiscan.com/NE/rollcall/LB274/id/1024417','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6198','2022-09-21 02:22:02','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1024682','1406017','64','2021-03-09','Advanced to Enrollment and Review Initial','46','0','1','2','49','1','https://legiscan.com/NE/rollcall/LB389/id/1024682','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6194','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_vote" VALUES ('1025117','1405095','64','2021-03-09','Government, Military and Veterans Affairs AM66 adopted','36','0','9','4','49','1','https://legiscan.com/NE/rollcall/LB368/id/1025117','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6199','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1025118','1405095','64','2021-03-09','Advanced to Enrollment and Review Initial','37','0','9','3','49','1','https://legiscan.com/NE/rollcall/LB368/id/1025118','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6200','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1025451','1406229','64','2021-03-10','Health and Human Services AM59 adopted','44','0','5','0','49','1','https://legiscan.com/NE/rollcall/LB401/id/1025451','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6216','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_bill_vote" VALUES ('1025452','1406229','64','2021-03-10','Advanced to Enrollment and Review Initial','38','0','11','0','49','1','https://legiscan.com/NE/rollcall/LB401/id/1025452','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6217','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_bill_vote" VALUES ('1025455','1404467','64','2021-03-10','Advanced to Enrollment and Review Initial','39','0','9','1','49','1','https://legiscan.com/NE/rollcall/LB351/id/1025455','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6213','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1025458','1395546','64','2021-03-10','Advanced to Enrollment and Review Initial','36','0','12','1','49','1','https://legiscan.com/NE/rollcall/LB100/id/1025458','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6211','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1025477','1396834','64','2021-03-10','Bostelman AM332 adopted','36','0','10','3','49','1','https://legiscan.com/NE/rollcall/LB148/id/1025477','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6207','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1025478','1410101','64','2021-03-10','Flood FA5 adopted','35','0','12','2','49','1','https://legiscan.com/NE/rollcall/LB503/id/1025478','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6208','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1025481','1396153','64','2021-03-10','Albrecht AM468 adopted','38','0','8','3','49','1','https://legiscan.com/NE/rollcall/LB113/id/1025481','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6206','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1025501','1398994','64','2021-03-10','Advanced to Enrollment and Review Initial','37','1','10','1','49','1','https://legiscan.com/NE/rollcall/LB255/id/1025501','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6220','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1025512','1408185','64','2021-03-10','Advanced to Enrollment and Review Initial','38','0','10','1','49','1','https://legiscan.com/NE/rollcall/LB476/id/1025512','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6214','2022-09-21 02:22:06','2022-09-21 02:22:06');
INSERT INTO "ls_bill_vote" VALUES ('1025665','1396732','64','2021-03-10','Wayne AM334 adopted','36','0','10','3','49','1','https://legiscan.com/NE/rollcall/LB163/id/1025665','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6205','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1025676','1395563','64','2021-03-10','Advanced to Enrollment and Review Initial','41','0','8','0','49','1','https://legiscan.com/NE/rollcall/LB37/id/1025676','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6218','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1025694','1410086','64','2021-03-10','Advanced to Enrollment and Review Initial','39','0','9','1','49','1','https://legiscan.com/NE/rollcall/LB533/id/1025694','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6215','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1025875','1395453','64','2021-03-10','Williams AM263 adopted','40','0','6','3','49','1','https://legiscan.com/NE/rollcall/LB66/id/1025875','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6204','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1025894','1410252','64','2021-03-10','Lindstrom AM537 adopted','40','0','8','1','49','1','https://legiscan.com/NE/rollcall/LB509/id/1025894','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6222','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1025912','1406211','64','2021-03-10','Revenue AM291 adopted','45','0','1','3','49','1','https://legiscan.com/NE/rollcall/LB387/id/1025912','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6202','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_vote" VALUES ('1025913','1406211','64','2021-03-10','Advanced to Enrollment and Review Initial','45','0','1','3','49','1','https://legiscan.com/NE/rollcall/LB387/id/1025913','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6203','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_vote" VALUES ('1026239','1404686','64','2021-03-10','Government, Military and Veterans Affairs AM67 adopted','39','0','8','2','49','1','https://legiscan.com/NE/rollcall/LB369/id/1026239','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6209','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026240','1404686','64','2021-03-10','Advanced to Enrollment and Review Initial','37','0','10','2','49','1','https://legiscan.com/NE/rollcall/LB369/id/1026240','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6210','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026335','1395482','64','2021-03-10','Advanced to Enrollment and Review Initial','39','0','9','1','49','1','https://legiscan.com/NE/rollcall/LB101/id/1026335','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6212','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_vote" VALUES ('1026345','1395545','64','2021-03-11','Passed on Final Reading 48-0-1','48','0','0','1','49','1','https://legiscan.com/NE/rollcall/LB21/id/1026345','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6230','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1026346','1395604','64','2021-03-11','Passed on Final Reading 47-0-2','47','0','1','1','49','1','https://legiscan.com/NE/rollcall/LB4/id/1026346','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6229','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1026354','1396829','64','2021-03-10','Advanced to Enrollment and Review Initial','42','0','7','0','49','1','https://legiscan.com/NE/rollcall/LB169/id/1026354','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6219','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1026355','1410310','64','2021-03-11','Passed on Final Reading 49-0-0','49','0','0','0','49','1','https://legiscan.com/NE/rollcall/LB532/id/1026355','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6247','2022-09-21 02:22:07','2022-09-21 02:22:07');
INSERT INTO "ls_bill_vote" VALUES ('1026363','1404739','64','2021-03-11','Passed on Final Reading 49-0-0','49','0','0','0','49','1','https://legiscan.com/NE/rollcall/LB373/id/1026363','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6245','2022-09-21 02:22:04','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026369','1396768','64','2021-03-11','Passed on Final Reading 49-0-0','49','0','0','0','49','1','https://legiscan.com/NE/rollcall/LB159/id/1026369','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6238','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1026412','1399134','64','2021-03-11','Passed on Final Reading with Emergency Clause 46-0-3','46','0','3','0','49','1','https://legiscan.com/NE/rollcall/LB253/id/1026412','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6242','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1026440','1395427','64','2021-03-11','Motion to return to Select File failed','21','21','6','1','49','0','https://legiscan.com/NE/rollcall/LB44/id/1026440','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6248','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1026441','1395427','64','2021-03-11','Passed on Final Reading 40-5-4','40','5','3','1','49','1','https://legiscan.com/NE/rollcall/LB44/id/1026441','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6249','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1026501','1395517','64','2021-03-11','Passed on Final Reading 48-0-1','48','0','0','1','49','1','https://legiscan.com/NE/rollcall/LB77/id/1026501','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6235','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_vote" VALUES ('1026502','1404882','64','2021-03-11','Passed on Final Reading with Emergency Clause 49-0-0','49','0','0','0','49','1','https://legiscan.com/NE/rollcall/LB363/id/1026502','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6244','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026512','1404138','64','2021-03-11','Education AM464 adopted','35','4','6','4','49','1','https://legiscan.com/NE/rollcall/LB322/id/1026512','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6250','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026513','1404138','64','2021-03-11','Advanced to Enrollment and Review Initial','33','5','8','3','49','1','https://legiscan.com/NE/rollcall/LB322/id/1026513','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6251','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_vote" VALUES ('1026833','1396765','64','2021-03-11','Passed on Final Reading 47-0-2','47','0','1','1','49','1','https://legiscan.com/NE/rollcall/LB149/id/1026833','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6237','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1026914','1399428','64','2021-03-11','Passed on Final Reading 48-0-1','48','0','1','0','49','1','https://legiscan.com/NE/rollcall/LB248/id/1026914','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6241','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_vote" VALUES ('1026965','1395458','64','2021-03-11','Passed on Final Reading with Emergency Clause 48-0-1','48','0','0','1','49','1','https://legiscan.com/NE/rollcall/LB25/id/1026965','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6233','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1027063','1395542','64','2021-03-11','Passed on Final Reading with Emergency Clause 47-0-2','47','0','1','1','49','1','https://legiscan.com/NE/rollcall/LB23/id/1027063','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6232','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_vote" VALUES ('1027078','1396869','64','2021-03-11','Passed on Final Reading 49-0-0','49','0','0','0','49','1','https://legiscan.com/NE/rollcall/LB174/id/1027078','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6240','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_vote" VALUES ('1027408','1395425','64','2021-03-11','Passed on Final Reading with Emergency Clause 45-0-4','45','0','3','1','49','1','https://legiscan.com/NE/rollcall/LB1/id/1027408','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6228','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_vote" VALUES ('1027964','1402493','64','2021-03-15','Government, Military and Veterans Affairs AM431 adopted','47','0','0','2','49','1','https://legiscan.com/NE/rollcall/LB285/id/1027964','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6256','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_vote" VALUES ('1027965','1402493','64','2021-03-15','Advanced to Enrollment and Review Initial','46','0','1','2','49','1','https://legiscan.com/NE/rollcall/LB285/id/1027965','https://nebraskalegislature.gov/bills/view_votes.php?KeyID=6257','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('127981','1395425','1','2','2021-01-12','Fiscal Note','Fiscal Note for LB1','389468','cd3d02db22036a83d7bf06bd1f8a01c4','0','','https://legiscan.com/NE/supplement/LB1/id/127981','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB1_20210112-075100.pdf','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_supplement" VALUES ('130317','1404526','2','2','2021-01-15','Analysis','Statement of Intent','6173','7cda903e425ac391a7826e76f484f52e','0','','https://legiscan.com/NE/supplement/LB323/id/130317','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB323.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('130324','1402641','2','2','2021-01-15','Analysis','Statement of Intent','5772','8efb78ea87dfd5ff74665dccea7dcafc','0','','https://legiscan.com/NE/supplement/LB289/id/130324','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB289.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('130325','1402680','2','2','2021-01-15','Analysis','Statement of Intent','5947','d0d03193f7374d141343490738228213','0','','https://legiscan.com/NE/supplement/LB288/id/130325','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB288.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('130328','1402749','2','2','2021-01-15','Analysis','Statement of Intent','5774','a454f371e332aef185bc4ab5a32dd5de','0','','https://legiscan.com/NE/supplement/LB286/id/130328','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB286.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('130331','1402761','2','2','2021-01-15','Analysis','Statement of Intent','6008','e52e82ff4a34bee844c47d264f87336d','0','','https://legiscan.com/NE/supplement/LB287/id/130331','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB287.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('130879','1402784','2','2','2021-01-19','Analysis','Statement of Intent','7050','7b496b41eb47e2ccda24fc5aaf086a40','0','','https://legiscan.com/NE/supplement/LB297/id/130879','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB297.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('130920','1399367','2','2','2021-01-19','Analysis','Statement of Intent','6505','1a89662874621555a694d948e07eac68','0','','https://legiscan.com/NE/supplement/LB249/id/130920','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB249.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('130941','1395900','2','2','2021-01-19','Analysis','Statement of Intent','6015','32f6c8a2148d90fb6e599c35f5eb517c','0','','https://legiscan.com/NE/supplement/LR1/id/130941','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LR1.pdf','2022-09-21 02:22:18','2022-09-21 02:22:18');
INSERT INTO "ls_bill_supplement" VALUES ('130982','1404391','2','2','2021-01-19','Analysis','Statement of Intent','6348','742957256a0cf3d78298f0cfe5c02ac7','0','','https://legiscan.com/NE/supplement/LB357/id/130982','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB357.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('130992','1403376','2','2','2021-01-19','Analysis','Statement of Intent','6781','516d7ac6e60620e1d54503d1f4383364','0','','https://legiscan.com/NE/supplement/LB307/id/130992','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB307.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('131010','1404862','2','2','2021-01-19','Analysis','Statement of Intent','6152','a1f1ff17368c4cbb9872f06bb2313fed','0','','https://legiscan.com/NE/supplement/LR20CA/id/131010','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LR20CA.pdf','2022-09-21 02:22:19','2022-09-21 02:22:19');
INSERT INTO "ls_bill_supplement" VALUES ('131015','1403220','2','2','2021-01-19','Analysis','Statement of Intent','6156','299b9816d6fd2252a3a58b622b0efeea','0','','https://legiscan.com/NE/supplement/LB308/id/131015','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB308.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('131037','1395550','2','2','2021-01-19','Analysis','Statement of Intent','5972','7f0e2dfba3db9d3628d5e8b3ee1c544f','0','','https://legiscan.com/NE/supplement/LB35/id/131037','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB35.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131040','1399165','2','2','2021-01-19','Analysis','Statement of Intent','6591','b815734452833db5fe59988cab5c799a','0','','https://legiscan.com/NE/supplement/LB260/id/131040','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB260.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131067','1399428','2','2','2021-01-19','Analysis','Statement of Intent','6102','17662c7735ebdb61f1afddbd212d5d40','0','','https://legiscan.com/NE/supplement/LB248/id/131067','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB248.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131086','1396957','2','2','2021-01-19','Analysis','Statement of Intent','6034','8325dc98f5ab2a6037c7a9a3792c4d4c','0','','https://legiscan.com/NE/supplement/LB203/id/131086','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB203.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131137','1397294','2','2','2021-01-19','Analysis','Statement of Intent','6186','e15cc6f55957df9d44a7ce2e9c7acf72','0','','https://legiscan.com/NE/supplement/LB205/id/131137','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB205.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131146','1402561','2','2','2021-01-19','Analysis','Statement of Intent','7132','bf320357bebf934b30d5756737597677','0','','https://legiscan.com/NE/supplement/LB277/id/131146','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB277.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('131157','1397577','2','2','2021-01-19','Analysis','Statement of Intent','5882','1dc071e7d1047fe518b00e082133ec64','0','','https://legiscan.com/NE/supplement/LB201/id/131157','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB201.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131192','1404553','2','2','2021-01-19','Analysis','Statement of Intent','6767','bcd8750459b3aa095650ca8452a236ae','0','','https://legiscan.com/NE/supplement/LB358/id/131192','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB358.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('131200','1397324','2','2','2021-01-19','Analysis','Statement of Intent','6223','b2fab9e9b859cc21b1e4346ae74ae24d','0','','https://legiscan.com/NE/supplement/LB210/id/131200','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB210.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131327','1395470','2','2','2021-01-20','Analysis','Statement of Intent','6151','a138e572de474f55d2da3d933e5791eb','0','','https://legiscan.com/NE/supplement/LB93/id/131327','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB93.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('131330','1395443','2','2','2021-01-20','Analysis','Statement of Intent','6745','dad6f7562748d0dd55dd81bbdca3def4','0','','https://legiscan.com/NE/supplement/LB94/id/131330','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB94.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('131391','1395444','2','2','2021-01-20','Analysis','Statement of Intent','6060','fba7f57d2187d66c41a0d79e1af90535','0','','https://legiscan.com/NE/supplement/LB75/id/131391','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB75.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131411','1395419','2','2','2021-01-20','Analysis','Statement of Intent','5897','f456dbee508dd2ac4897738aa8c9b9be','0','','https://legiscan.com/NE/supplement/LB70/id/131411','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB70.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131463','1398749','2','2','2021-01-20','Analysis','Statement of Intent','5890','87947edbf6e8bee043efca83e2cfa4e6','0','','https://legiscan.com/NE/supplement/LB223/id/131463','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB223.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131495','1395517','2','2','2021-01-20','Analysis','Statement of Intent','5978','414e242d50e341cdb301a840c97acf3f','0','','https://legiscan.com/NE/supplement/LB77/id/131495','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB77.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131501','1395563','2','2','2021-01-20','Analysis','Statement of Intent','6173','6d4b5bc03b170ee4c3198fb0ebca8cf9','0','','https://legiscan.com/NE/supplement/LB37/id/131501','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB37.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131523','1396887','2','2','2021-01-20','Analysis','Statement of Intent','5895','94e766edf2f964a5d60c7419c9d7808e','0','','https://legiscan.com/NE/supplement/LB153/id/131523','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB153.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131647','1395448','2','2','2021-01-20','Analysis','Statement of Intent','5898','4a3f8f68b9c43b6e78a011582f6b3796','0','','https://legiscan.com/NE/supplement/LB90/id/131647','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB90.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131723','1395577','2','2','2021-01-20','Analysis','Statement of Intent','6635','7899639e345cee2e42da83c8c870fb0e','0','','https://legiscan.com/NE/supplement/LB78/id/131723','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB78.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131777','1395528','2','2','2021-01-21','Analysis','Statement of Intent','7734','c4eca493adc7b3073257caf2be4d2098','0','','https://legiscan.com/NE/supplement/LB17/id/131777','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB17.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131781','1396829','2','2','2021-01-21','Analysis','Statement of Intent','5799','bb96488144ac463d54d346bb69f6a4d9','0','','https://legiscan.com/NE/supplement/LB169/id/131781','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB169.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131794','1396263','2','2','2021-01-21','Analysis','Statement of Intent','5918','31f0cc9f7d5efd492dee1075b837f386','0','','https://legiscan.com/NE/supplement/LB137/id/131794','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB137.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('131831','1395578','2','2','2021-01-21','Analysis','Statement of Intent','6084','925dba619bd485460bbcb020f683d37f','0','','https://legiscan.com/NE/supplement/LB19/id/131831','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB19.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131832','1403261','2','2','2021-01-21','Analysis','Statement of Intent','5935','6935d06d2d1d2a6b445850d38726a69b','0','','https://legiscan.com/NE/supplement/LB312/id/131832','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB312.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('131842','1395567','2','2','2021-01-21','Analysis','Statement of Intent','5874','ffe5aab36f6cb16d4304a5952de7de4c','0','','https://legiscan.com/NE/supplement/LB72/id/131842','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB72.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131857','1397668','2','2','2021-01-21','Analysis','Statement of Intent','5902','a14e3865291b820b59ebc9ce03d454a2','0','','https://legiscan.com/NE/supplement/LB197/id/131857','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB197.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131858','1396768','2','2','2021-01-21','Analysis','Statement of Intent','5912','af638929918b54edc2a2107773ea2e87','0','','https://legiscan.com/NE/supplement/LB159/id/131858','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB159.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131860','1398994','2','2','2021-01-21','Analysis','Statement of Intent','6061','29472486bf222eb7a0217a29d5ad1931','0','','https://legiscan.com/NE/supplement/LB255/id/131860','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB255.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131867','1396294','2','2','2021-01-21','Analysis','Statement of Intent','5872','46a9ceedfcbae8e571bb1678a87938f3','0','','https://legiscan.com/NE/supplement/LB126/id/131867','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB126.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('131869','1396732','2','2','2021-01-21','Analysis','Statement of Intent','6933','2c779fafafe6f78d87863ffd04db3c9f','0','','https://legiscan.com/NE/supplement/LB163/id/131869','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB163.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131876','1395458','2','2','2021-01-21','Analysis','Statement of Intent','6057','998b424221a2c0d61e745386b003ec1a','0','','https://legiscan.com/NE/supplement/LB25/id/131876','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB25.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131877','1395495','2','2','2021-01-21','Analysis','Statement of Intent','6523','07b0e4037cf5d3b4f7598089dfc97197','0','','https://legiscan.com/NE/supplement/LB46/id/131877','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB46.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131884','1406211','2','2','2021-01-21','Analysis','Statement of Intent','6114','477e63e4124bb953f2f85962b3b28d57','0','','https://legiscan.com/NE/supplement/LB387/id/131884','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB387.pdf','2022-09-21 02:22:04','2022-09-21 02:22:04');
INSERT INTO "ls_bill_supplement" VALUES ('131891','1395617','2','2','2021-01-21','Analysis','Statement of Intent','6739','49544fdb63f04f49b480dd6062d43cc3','0','','https://legiscan.com/NE/supplement/LB47/id/131891','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB47.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131894','1396725','2','2','2021-01-21','Analysis','Statement of Intent','6556','13446bc8f6e4bf4bff7b767a5e4164ea','0','','https://legiscan.com/NE/supplement/LB152/id/131894','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB152.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131901','1396844','2','2','2021-01-21','Analysis','Statement of Intent','5943','dd212493bf4379697fc069b7356ff226','0','','https://legiscan.com/NE/supplement/LB190/id/131901','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB190.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131903','1395608','2','2','2021-01-21','Analysis','Statement of Intent','5938','9088d615025ce16ca6ab30c499132a5b','0','','https://legiscan.com/NE/supplement/LB91/id/131903','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB91.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131923','1395431','2','2','2021-01-21','Analysis','Statement of Intent','6644','61da7fd9faa5f6a561c0fb31f5af1dc4','0','','https://legiscan.com/NE/supplement/LB45/id/131923','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB45.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131927','1402550','2','2','2021-01-21','Analysis','Statement of Intent','6059','b87c9d55e2a86e12c435d1ae968b2fb4','0','','https://legiscan.com/NE/supplement/LB298/id/131927','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB298.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('131937','1398544','2','2','2021-01-21','Analysis','Statement of Intent','6045','deb5a61ad23c0a3a56fc5408b9b4eb05','0','','https://legiscan.com/NE/supplement/LB213/id/131937','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB213.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131946','1404653','2','2','2021-01-21','Analysis','Statement of Intent','6130','221c3a57edfdcc16304737ba1a1d4cfd','0','','https://legiscan.com/NE/supplement/LB336/id/131946','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB336.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('131951','1395604','2','2','2021-01-21','Analysis','Statement of Intent','6003','9d4b4ce1d95fa908b48613853af55294','0','','https://legiscan.com/NE/supplement/LB4/id/131951','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB4.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('131955','1399705','2','2','2021-01-21','Analysis','Statement of Intent','5824','e4002574304e83317162fbc7ea8ca0c1','0','','https://legiscan.com/NE/supplement/LB240/id/131955','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB240.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131966','1395427','2','2','2021-01-21','Analysis','Statement of Intent','6022','c0b9ca01879471d5f3a151fc7cd6253d','0','','https://legiscan.com/NE/supplement/LB44/id/131966','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB44.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('131969','1396749','2','2','2021-01-21','Analysis','Statement of Intent','5924','b1226e3305028a094a2feca8ef2c11b8','0','','https://legiscan.com/NE/supplement/LB162/id/131969','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB162.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('131971','1398863','2','2','2021-01-21','Analysis','Statement of Intent','5905','ce8c3d6f6913c194a6821787217bd0db','0','','https://legiscan.com/NE/supplement/LB239/id/131971','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB239.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('131984','1404686','2','2','2021-01-21','Analysis','Statement of Intent','6295','48d1a7d63d9056d0013d0a42d70ad3de','0','','https://legiscan.com/NE/supplement/LB369/id/131984','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB369.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('131990','1405095','2','2','2021-01-21','Analysis','Statement of Intent','6003','6c21054393cf7e4ce2b02f734f04407f','0','','https://legiscan.com/NE/supplement/LB368/id/131990','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB368.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('131999','1396827','2','2','2021-01-21','Analysis','Statement of Intent','6016','00fb13799a59c08369991f6d97cb3f2b','0','','https://legiscan.com/NE/supplement/LB191/id/131999','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB191.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132009','1396892','2','2','2021-01-21','Analysis','Statement of Intent','5972','e252649aefdd42e3d64b279f0def0774','0','','https://legiscan.com/NE/supplement/LB184/id/132009','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB184.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132013','1403300','2','2','2021-01-21','Analysis','Statement of Intent','6888','ecbf1a2178f2a5d8ad807ed08805f5ca','0','','https://legiscan.com/NE/supplement/LB302/id/132013','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB302.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('132023','1395566','2','2','2021-01-21','Analysis','Statement of Intent','5951','8303cb001a4c8f110263ebae268268b9','0','','https://legiscan.com/NE/supplement/LB74/id/132023','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB74.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132040','1396797','2','2','2021-01-21','Analysis','Statement of Intent','6465','8594f95c56309e97d65b4f2e9c170750','0','','https://legiscan.com/NE/supplement/LB166/id/132040','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB166.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132087','1404226','2','2','2021-01-21','Analysis','Statement of Intent','6393','79e1f59d4a513ec4251764a3dba5fde2','0','','https://legiscan.com/NE/supplement/LB330/id/132087','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB330.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('132089','1396170','2','2','2021-01-21','Analysis','Statement of Intent','5928','a7face8808b26eec97a8397c8e6e90ef','0','','https://legiscan.com/NE/supplement/LB135/id/132089','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB135.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132130','1395452','2','2','2021-01-21','Analysis','Statement of Intent','6832','784bfaf87c99e6b4593991fe8d5c9a6f','0','','https://legiscan.com/NE/supplement/LB43/id/132130','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB43.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132150','1395527','2','2','2021-01-21','Analysis','Statement of Intent','5823','5d7b622153aeef993025e9db57670370','0','','https://legiscan.com/NE/supplement/LB82/id/132150','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB82.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132155','1395489','2','2','2021-01-21','Analysis','Statement of Intent','6983','25b057efe096319b924b565d28996ed1','0','','https://legiscan.com/NE/supplement/LB48/id/132155','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB48.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132159','1396057','2','2','2021-01-21','Analysis','Statement of Intent','6621','c3a92fbaa8958d83407cb66124355d85','0','','https://legiscan.com/NE/supplement/LB106/id/132159','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB106.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132160','1396869','2','2','2021-01-21','Analysis','Statement of Intent','5946','471351a6188da95e022d26837702a8f1','0','','https://legiscan.com/NE/supplement/LB174/id/132160','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB174.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132172','1395444','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB75','897715','07fa6d6a915a326ad2565a68b6a07dbf','0','','https://legiscan.com/NE/supplement/LB75/id/132172','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB75_20210122-063151.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132173','1398994','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB255','407519','a293d04529e25862ba727b632695db83','0','','https://legiscan.com/NE/supplement/LB255/id/132173','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB255_20210122-063449.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('132175','1396725','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB152','395368','4bc232a9d71e330efbf08999a09aadd7','0','','https://legiscan.com/NE/supplement/LB152/id/132175','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB152_20210122-063342.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132177','1395563','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB37','293932','ddff88cee4aa05977e125506b61a5a76','0','','https://legiscan.com/NE/supplement/LB37/id/132177','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB37_20210122-063110.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132180','1396153','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB113','830920','e3a3e2f0f5fcf388f1ec141db4a5dd62','0','','https://legiscan.com/NE/supplement/LB113/id/132180','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB113_20210122-063239.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132181','1395545','2','2','2021-01-22','Analysis','Statement of Intent','8138','b04ff472d9af0b656f139a51a0deaa5c','0','','https://legiscan.com/NE/supplement/LB21/id/132181','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB21.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132182','1395545','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB21','190780','97b2c3938988a49e3cf64b9b7acd071d','0','','https://legiscan.com/NE/supplement/LB21/id/132182','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB21_20210122-063022.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132186','1397324','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB210','394192','027e67c1fdbca7c44cdcd22fdd5e0443','0','','https://legiscan.com/NE/supplement/LB210/id/132186','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB210_20210122-063428.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('132187','1396829','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB169','394068','2d396fb98ab262f6a79cd7a61cf2478a','0','','https://legiscan.com/NE/supplement/LB169/id/132187','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB169_20210122-063406.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132189','1396777','2','2','2021-01-22','Analysis','Statement of Intent','6399','4757ebae92cdae722a878e3fc935074b','0','','https://legiscan.com/NE/supplement/LB155/id/132189','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB155.pdf','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_bill_supplement" VALUES ('132191','1395426','2','2','2021-01-22','Analysis','Statement of Intent','7540','79c077f64ca67dcfcac2b5ba893c160d','0','','https://legiscan.com/NE/supplement/LB22/id/132191','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB22.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132192','1395426','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB22','192164','6576ea34705463773741170be0076301','0','','https://legiscan.com/NE/supplement/LB22/id/132192','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB22_20210122-063050.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132197','1404739','2','2','2021-01-22','Analysis','Statement of Intent','6194','921cd9705979c4897303a4e55d7ac233','0','','https://legiscan.com/NE/supplement/LB373/id/132197','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB373.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('132198','1404739','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB373','192711','157a592833f829a2934e7a10f3f3e117','0','','https://legiscan.com/NE/supplement/LB373/id/132198','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB373_20210122-063538.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('132205','1404882','2','2','2021-01-22','Analysis','Statement of Intent','10165','dd6855a961f20999d1bd2fd5c910fdd9','0','','https://legiscan.com/NE/supplement/LB363/id/132205','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB363.pdf','2022-09-21 02:22:03','2022-09-21 02:22:03');
INSERT INTO "ls_bill_supplement" VALUES ('132208','1396263','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB137','472909','b24ce07074f982961c831ee809910149','0','','https://legiscan.com/NE/supplement/LB137/id/132208','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB137_20210122-063259.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132215','1403060','2','2','2021-01-22','Analysis','Statement of Intent','6066','d2caa70dae0a747815b423f03ebe0cc0','0','','https://legiscan.com/NE/supplement/LB306/id/132215','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB306.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('132224','1403261','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB312','89747','580fcecb0ee14d74297813b2dc68d846','0','','https://legiscan.com/NE/supplement/LB312/id/132224','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB312_20210122-063516.pdf','2022-09-21 02:22:02','2022-09-21 02:22:02');
INSERT INTO "ls_bill_supplement" VALUES ('132227','1402796','2','2','2021-01-22','Analysis','Statement of Intent','6526','034b863158d9afbad382affea291a033','0','','https://legiscan.com/NE/supplement/LB268/id/132227','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB268.pdf','2022-09-21 02:22:01','2022-09-21 02:22:01');
INSERT INTO "ls_bill_supplement" VALUES ('132230','1395520','2','2','2021-01-22','Analysis','Statement of Intent','6414','86853fb161a65c7c44f6a2c8c8786ef7','0','','https://legiscan.com/NE/supplement/LB15/id/132230','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB15.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132255','1395485','2','2','2021-01-22','Analysis','Statement of Intent','5889','c970b72091bdade28c2eae269d3b37a4','0','','https://legiscan.com/NE/supplement/LB28/id/132255','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB28.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132256','1395542','2','2','2021-01-22','Analysis','Statement of Intent','7067','d7157eece87ef2ded52eee5ee1e938b1','0','','https://legiscan.com/NE/supplement/LB23/id/132256','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB23.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132257','1395806','2','2','2021-01-22','Analysis','Statement of Intent','6509','616f34128d9b45d60a095cabf560262e','0','','https://legiscan.com/NE/supplement/LB128/id/132257','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB128.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132258','1395422','2','2','2021-01-22','Analysis','Statement of Intent','6370','a15574a408d49244ebee4d9ddf139cf8','0','','https://legiscan.com/NE/supplement/LB14/id/132258','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB14.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_supplement" VALUES ('132259','1395453','2','2','2021-01-22','Analysis','Statement of Intent','6865','353e93e8fd2882d9671d2f9f8b338d12','0','','https://legiscan.com/NE/supplement/LB66/id/132259','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB66.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_supplement" VALUES ('132262','1395474','2','2','2021-01-22','Analysis','Statement of Intent','6422','7e4eea5beca1c4964f6b41334d052f7f','0','','https://legiscan.com/NE/supplement/LB92/id/132262','https://nebraskalegislature.gov/FloorDocs/107/PDF/SI/LB92.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_supplement" VALUES ('132264','1395577','1','2','2021-01-22','Fiscal Note','Fiscal Note for LB78','599627','e22ace7eacf2372c17aea1f1408615e3','0','','https://legiscan.com/NE/supplement/LB78/id/132264','https://nebraskalegislature.gov/FloorDocs/107/PDF/FN/LB78_20210122-120355.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_progress" VALUES ('0','Prefiled');
INSERT INTO "ls_progress" VALUES ('1','Introduced');
INSERT INTO "ls_progress" VALUES ('2','Engrossed');
INSERT INTO "ls_progress" VALUES ('3','Enrolled');
INSERT INTO "ls_progress" VALUES ('4','Passed');
INSERT INTO "ls_progress" VALUES ('5','Vetoed');
INSERT INTO "ls_progress" VALUES ('6','Failed');
INSERT INTO "ls_progress" VALUES ('7','Override');
INSERT INTO "ls_progress" VALUES ('8','Chaptered');
INSERT INTO "ls_progress" VALUES ('9','Refer');
INSERT INTO "ls_progress" VALUES ('10','Report Pass');
INSERT INTO "ls_progress" VALUES ('11','Report DNP');
INSERT INTO "ls_progress" VALUES ('12','Draft');
INSERT INTO "ls_sast_type" VALUES ('1','Same As');
INSERT INTO "ls_sast_type" VALUES ('2','Similar To');
INSERT INTO "ls_sast_type" VALUES ('3','Replaced by');
INSERT INTO "ls_sast_type" VALUES ('4','Replaces');
INSERT INTO "ls_sast_type" VALUES ('5','Crossfiled');
INSERT INTO "ls_sast_type" VALUES ('6','Enabling for');
INSERT INTO "ls_sast_type" VALUES ('7','Enabled by');
INSERT INTO "ls_sast_type" VALUES ('8','Related');
INSERT INTO "ls_sast_type" VALUES ('9','Carry Over');
INSERT INTO "ls_bill" VALUES ('1395419','27','1810','64','64','1','LB70','4','2021-04-20','Authorize the State Athletic Commissioner to regulate professional kickboxing and professional bare-knuckle boxing','Authorize the State Athletic Commissioner to regulate professional kickboxing and professional bare-knuckle boxing','0','https://legiscan.com/NE/bill/LB70/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43854','c1a2266e347024cc4df3cc86284dd63e','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395421','27','1810','64','64','1','LB2','4','2021-05-26','Change the valuation of agricultural land and horticultural land for certain school district taxes','Change the valuation of agricultural land and horticultural land for certain school district taxes','0','https://legiscan.com/NE/bill/LB2/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43597','ee39d4c661d9a3b83ef4e7e95370c24a','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill" VALUES ('1395422','27','1810','64','64','1','LB14','4','2021-03-31','Adopt the Audiology and Speech-Language Pathology Interstate Compact','Adopt the Audiology and Speech-Language Pathology Interstate Compact','0','https://legiscan.com/NE/bill/LB14/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43430','4c2cc725030061a8f6c6ebeb25afc459','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395423','27','1810','64','64','1','LB84','4','2021-05-26','Redefine terms relating to tax incentive performance audits and the ImagiNE Nebraska Act','Redefine terms relating to tax incentive performance audits and the ImagiNE Nebraska Act','0','https://legiscan.com/NE/bill/LB84/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43728','7612ccc863c7ec39c2a3ed9d35592adb','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395425','27','1810','64','64','1','LB1','4','2021-03-17','Correlate provisions of Laws 2019, LB538, with Initiative Law 2020, No. 430, regarding mechanical amusement devices','Correlate provisions of Laws 2019, LB538, with Initiative Law 2020, No. 430, regarding mechanical amusement devices','0','https://legiscan.com/NE/bill/LB1/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44002','fd5f497803313747896cb3266f6e3f71','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill" VALUES ('1395426','27','1810','64','64','1','LB22','4','2021-04-07','Change provisions of the Nebraska Protection in Annuity Transactions Act','Change provisions of the Nebraska Protection in Annuity Transactions Act','0','https://legiscan.com/NE/bill/LB22/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43724','99ba9f59da108176892f0ba2f23dbf61','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395427','27','1810','64','64','1','LB44','4','2021-03-17','Change requirements for adoption of an affordable housing action plan','Change requirements for adoption of an affordable housing action plan','0','https://legiscan.com/NE/bill/LB44/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43511','8a201560c8597a562eb04d3975b35883','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395429','27','1810','64','64','1','LB85','1','2021-01-07','Require Nebraska State Patrol to provide notice of expiration of concealed handgun permits','Require Nebraska State Patrol to provide notice of expiration of concealed handgun permits','0','https://legiscan.com/NE/bill/LB85/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43727','6821c95c6b30ae77ddb52e100685c50c','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395431','27','1810','64','64','1','LB45','1','2021-01-07','Eliminate provisions relating to continuance of proceedings under the Uniform Residential Landlord and Tenant Act','Eliminate provisions relating to continuance of proceedings under the Uniform Residential Landlord and Tenant Act','0','https://legiscan.com/NE/bill/LB45/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43843','73c3c86288879a8a2487d224967d3dee','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395433','27','1810','64','64','1','LB32','1','2021-01-07','Provide for Class ICA and IDA felony classifications and change penalties','Provide for Class ICA and IDA felony classifications and change penalties','0','https://legiscan.com/NE/bill/LB32/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43666','84b3e996ebc4aa5f3ff4f60e4ad8413c','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395436','27','1810','64','64','1','LB79','1','2021-01-07','Change the minimum amount of relief provided under the Property Tax Credit Act','Change the minimum amount of relief provided under the Property Tax Credit Act','0','https://legiscan.com/NE/bill/LB79/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44081','8432ff1fafd71aece310165a9d2cddf4','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395438','27','1810','64','64','1','LB10','1','2021-01-07','Change motor vehicle and property tax exemptions for disabled veterans','Change motor vehicle and property tax exemptions for disabled veterans','0','https://legiscan.com/NE/bill/LB10/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43875','686487bce193e2c5a9bddb96f0f7f40c','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395440','27','1810','64','64','1','LB60','1','2021-01-07','Change provisions related to community college levies','Change provisions related to community college levies','0','https://legiscan.com/NE/bill/LB60/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43556','8ab5a11c32c615a07e7a6113219611e3','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395442','27','1810','64','64','1','LB30','1','2021-01-07','Limit the amount an insured pays for prescription insulin drugs','Limit the amount an insured pays for prescription insulin drugs','0','https://legiscan.com/NE/bill/LB30/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43693','5665f92a8588708c124b3b2c4f44e511','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395443','27','1810','64','64','1','LB94','4','2021-03-31','Prohibit invalidation of certain online notarial acts performed under the Governor''s Executive Order','Prohibit invalidation of certain online notarial acts performed under the Governor''s Executive Order','0','https://legiscan.com/NE/bill/LB94/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43976','02ff2665d17c1cf0902eef02133c9226','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395444','27','1810','64','64','1','LB75','4','2022-04-20','Change provisions relating to township libraries','Change provisions relating to township libraries','0','https://legiscan.com/NE/bill/LB75/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43901','131629b2340771fe7ed5537eb95e4ce0','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395448','27','1810','64','64','1','LB90','4','2021-05-21','Change fee provisions under the Pesticide Act and the Nebraska Commercial Fertilizer and Soil Conditioner Act','Change fee provisions under the Pesticide Act and the Nebraska Commercial Fertilizer and Soil Conditioner Act','0','https://legiscan.com/NE/bill/LB90/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43988','9f2cd4ec4a818d8e35f40879d7ea7c7e','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395450','27','1810','64','64','1','LB58','4','2021-05-05','Change requirements for service by publication for delinquent liens arising from city or village special assessments','Change requirements for service by publication for delinquent liens arising from city or village special assessments','0','https://legiscan.com/NE/bill/LB58/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43867','656cc3dcab6e293fa688c9d47cd9eacd','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395452','27','1810','64','64','1','LB43','1','2021-01-07','Provide for election of election commissioners and eliminate certain deputy positions','Provide for election of election commissioners and eliminate certain deputy positions','0','https://legiscan.com/NE/bill/LB43/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44054','0ef5135c9cfcdb7f353c1ca478a63862','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395453','27','1810','64','64','1','LB66','4','2021-03-31','Change deposit, bond, custodial official, and pooled collateral provisions under the Public Funds Deposit Security Act','Change deposit, bond, custodial official, and pooled collateral provisions under the Public Funds Deposit Security Act','0','https://legiscan.com/NE/bill/LB66/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43973','53721ea2ed6bbfe2a4125853a2f9ddc5','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395457','27','1810','64','64','1','LB59','4','2022-04-20','Change provisions regarding sales of tourism promotional products by the Nebraska Tourism Commission and distribution of revenue','Change provisions regarding sales of tourism promotional products by the Nebraska Tourism Commission and distribution of revenue','0','https://legiscan.com/NE/bill/LB59/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43797','8e2df8a44cc7135887d6f03811007a49','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395458','27','1810','64','64','1','LB25','4','2021-03-17','Change provisions relating to the division of ad valorem taxes under the Community Development Law','Change provisions relating to the division of ad valorem taxes under the Community Development Law','0','https://legiscan.com/NE/bill/LB25/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43660','8173c46b40adf03d709c021c91a8d53f','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395460','27','1810','64','64','1','LB31','1','2021-01-07','Authorize punitive damages as prescribed and provide for distribution','Authorize punitive damages as prescribed and provide for distribution','0','https://legiscan.com/NE/bill/LB31/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43715','719f4beca4c95a35049e17e624a04834','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395462','27','1810','64','64','1','LB34','1','2021-01-07','Change sentencing provisions for crimes committed by a person under twenty-one years of age','Change sentencing provisions for crimes committed by a person under twenty-one years of age','0','https://legiscan.com/NE/bill/LB34/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43667','04f16a8987824cfdc0d0a46003c6f99a','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395465','27','1810','64','64','1','LB6','1','2021-01-07','Change provisions relating to the taxation of military retirement benefits','Change provisions relating to the taxation of military retirement benefits','0','https://legiscan.com/NE/bill/LB6/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43653','1e32152160bb4b7b04d8395faab406d6','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395466','27','1810','64','64','1','LB63','4','2021-05-05','Change certain deadlines relating to property tax exemptions','Change certain deadlines relating to property tax exemptions','0','https://legiscan.com/NE/bill/LB63/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43628','ae7423a7e6a3e69c61d5b3f3d7a9a76c','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395468','27','1810','64','64','1','LB5','4','2021-04-20','Adopt the Purple Star Schools Act','Adopt the Purple Star Schools Act','0','https://legiscan.com/NE/bill/LB5/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43629','c8eb433c155998c9d6c4b0910c16f442','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395469','27','1810','64','64','1','LB24','1','2021-01-07','Change fee, remittance, and distribution provisions relating to the Nebraska Retirement Fund for Judges','Change fee, remittance, and distribution provisions relating to the Nebraska Retirement Fund for Judges','0','https://legiscan.com/NE/bill/LB24/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43765','eebab5c5dcbae10d50b5906fac990edd','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395470','27','1810','64','64','1','LB93','4','2021-03-31','Eliminate a reporting requirement regarding marriages','Eliminate a reporting requirement regarding marriages','0','https://legiscan.com/NE/bill/LB93/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43673','e1263059327656af46bbeb063f829007','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395474','27','1810','64','64','1','LB92','4','2021-04-21','Change residency requirements for college tuition purposes for students from exempt schools and prohibit discrimination against such students','Change residency requirements for college tuition purposes for students from exempt schools and prohibit discrimination against such students','0','https://legiscan.com/NE/bill/LB92/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43859','bc0be33b28df5be2cd9637488dc963ab','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395477','27','1810','64','64','1','LB67','1','2021-01-07','Change provisions relating to school-based health centers under the Medical Assistance Act','Change provisions relating to school-based health centers under the Medical Assistance Act','0','https://legiscan.com/NE/bill/LB67/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44039','e13f02e41ed8e061d8341f97e5c65646','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395479','27','1810','64','64','1','LB33','1','2021-01-07','Change provisions relating to minimum sentences','Change provisions relating to minimum sentences','0','https://legiscan.com/NE/bill/LB33/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43665','79f2597fb58c5f394e7047de00039d09','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395480','27','1810','64','64','1','LB29','4','2022-04-20','Designate Juneteenth National Independence Day as a state holiday','Designate Juneteenth National Independence Day as a state holiday','0','https://legiscan.com/NE/bill/LB29/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43796','04e6a65929aaf2034984219810d577b5','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395482','27','1810','64','64','1','LB101','4','2021-04-21','Change the date for addition of long-term care services and supports under the medicaid managed care program','Change the date for addition of long-term care services and supports under the medicaid managed care program','0','https://legiscan.com/NE/bill/LB101/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44086','8bf209939b7b34b7c5ddb9b9697f2067','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395483','27','1810','64','64','1','LB18','4','2021-05-26','Change provisions relating to equivalent employees and qualified locations under the ImagiNE Nebraska Act','Change provisions relating to equivalent employees and qualified locations under the ImagiNE Nebraska Act','0','https://legiscan.com/NE/bill/LB18/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44077','3af4ef3cc6df0d3d91530600dc31f4e8','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395485','27','1810','64','64','1','LB28','1','2021-01-07','Provide for motions for new trial based on newly discovered evidence','Provide for motions for new trial based on newly discovered evidence','0','https://legiscan.com/NE/bill/LB28/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43922','093cd095a1e1d9239555c4c0f5fdbcfe','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395487','27','1810','64','64','1','LB16','1','2021-01-07','Provide for state contributions to the Nebraska Retirement Fund for Judges','Provide for state contributions to the Nebraska Retirement Fund for Judges','0','https://legiscan.com/NE/bill/LB16/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43749','702083e890fecb6283f07bd9db09aa12','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395489','27','1810','64','64','1','LB48','1','2021-01-07','Change provisions relating to marriage and annulments','Change provisions relating to marriage and annulments','0','https://legiscan.com/NE/bill/LB48/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43793','931c4c78eeea9a4de8302a1d71c41932','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395491','27','1810','64','64','1','LB71','1','2021-01-07','Change provisions relating to intentional tort claims under the Political Subdivisions Tort Claims Act and State Tort Claims Act','Change provisions relating to intentional tort claims under the Political Subdivisions Tort Claims Act and State Tort Claims Act','0','https://legiscan.com/NE/bill/LB71/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43777','f0f3420fdcdc72f17693a30b347110be','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395495','27','1810','64','64','1','LB46','1','2021-01-07','Eliminate an alternative service provision under the Uniform Residential Landlord and Tenant Act','Eliminate an alternative service provision under the Uniform Residential Landlord and Tenant Act','0','https://legiscan.com/NE/bill/LB46/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43847','395e2431fcb25b11bdb478621792840d','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395496','27','1810','64','64','1','LB104','1','2021-01-07','Allow aggregation of pecuniary losses for criminal mischief offenses','Allow aggregation of pecuniary losses for criminal mischief offenses','0','https://legiscan.com/NE/bill/LB104/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43831','7a08050ecc944d725472899554eaa3a3','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395498','27','1810','64','64','1','LB81','4','2021-05-05','Provide authority for sanitary and improvement districts to own, construct, and maintain public parking facilities','Provide authority for sanitary and improvement districts to own, construct, and maintain public parking facilities','0','https://legiscan.com/NE/bill/LB81/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43486','ee6ea71b8098401401b0f71e6da0d2e0','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395499','27','1810','64','64','1','LB51','4','2021-05-26','Change provisions relating to qualifications, training, certification, accreditation, powers, and duties of certain law enforcement personnel','Change provisions relating to qualifications, training, certification, accreditation, powers, and duties of certain law enforcement personnel','0','https://legiscan.com/NE/bill/LB51/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43686','b7957a5fcefd9670eb75cf30447158b5','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395501','27','1810','64','64','1','LB42','1','2021-01-07','Provide for transfers to the Hall of Fame Trust Fund','Provide for transfers to the Hall of Fame Trust Fund','0','https://legiscan.com/NE/bill/LB42/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43493','ba36c57752c89512fbdef28fdc99f821','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395503','27','1810','64','64','1','LB102','1','2021-01-07','Provide for transfer of duties of clerks of the district court to clerk magistrates','Provide for transfer of duties of clerks of the district court to clerk magistrates','0','https://legiscan.com/NE/bill/LB102/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43828','4215b29ed825a937719de6add15ccbf0','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395505','27','1810','64','64','1','LB55','6','2021-02-01','Change judges'' salaries','Change judges'' salaries','0','https://legiscan.com/NE/bill/LB55/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43712','3c02cdb5de02ca1133e74aaa6abbd462','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395508','27','1810','64','64','1','LB76','1','2021-01-07','Change apportionment of Nebraska''s electoral college votes','Change apportionment of Nebraska''s electoral college votes','0','https://legiscan.com/NE/bill/LB76/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43856','23230f0725ddc8b174095ef8b543d071','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395509','27','1810','64','64','1','LB103','4','2021-05-26','Appropriate funds to aid counties to pay certain federal judgments','Appropriate funds to aid counties to pay certain federal judgments','0','https://legiscan.com/NE/bill/LB103/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44105','9523c616dc6c555c0359a6bccb9bce76','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395514','27','1810','64','64','1','LB96','1','2021-01-07','Change provisions related to sanitary and improvement district hearings','Change provisions related to sanitary and improvement district hearings','0','https://legiscan.com/NE/bill/LB96/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43572','52a572f6eb6912c2647d9ed196073a9b','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395516','27','1810','64','64','1','LB56','1','2021-01-07','Change provisions relating to administration of and eligibility for parole','Change provisions relating to administration of and eligibility for parole','0','https://legiscan.com/NE/bill/LB56/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44087','4ddf87d951a72e0f5103109cdcbea00b','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395517','27','1810','64','64','1','LB77','4','2021-03-17','Prohibit insurance risk classifications and rate adjustments based on the fact that the insured is deployed in the military','Prohibit insurance risk classifications and rate adjustments based on the fact that the insured is deployed in the military','0','https://legiscan.com/NE/bill/LB77/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43434','4b43ab164905eefd459b5f444a635264','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395518','27','1810','64','64','1','LB88','2','2021-03-18','Protect free speech rights of student journalists and student media advisers','Protect free speech rights of student journalists and student media advisers','0','https://legiscan.com/NE/bill/LB88/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43808','9122d00228af785481c89babf1a66d9f','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395520','27','1810','64','64','1','LB15','1','2021-01-07','Adopt the Occupational Therapy Practice Interstate Compact','Adopt the Occupational Therapy Practice Interstate Compact','0','https://legiscan.com/NE/bill/LB15/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43429','060f4d0b4c2f811deb0c0ae505d77b2a','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395525','27','1810','64','64','1','LB20','1','2021-01-07','Provide for insurance coverage of and medicaid access to prescribed contraceptives','Provide for insurance coverage of and medicaid access to prescribed contraceptives','0','https://legiscan.com/NE/bill/LB20/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44022','a3eaa672251b3a32f54d6f0b8d7dcfdb','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395527','27','1810','64','64','1','LB82','1','2021-01-07','Change motor vehicle tax schedules','Change motor vehicle tax schedules','0','https://legiscan.com/NE/bill/LB82/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43713','a42e1028c91cb2b3c720f2a85a4c0ce7','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395528','27','1810','64','64','1','LB17','4','2021-05-05','Change fees for and provide for transfers to the Nebraska Retirement Fund for Judges and change actuarial valuation and amortization provisions for certain state retirement systems','Change fees for and provide for transfers to the Nebraska Retirement Fund for Judges and change actuarial valuation and amortization provisions for certain state retirement systems','0','https://legiscan.com/NE/bill/LB17/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43892','92bf2fa95ad6c700e7c80642618daa94','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395529','27','1810','64','64','1','LB8','1','2021-01-07','Change independent expenditure reporting requirements and require electioneering reporting','Change independent expenditure reporting requirements and require electioneering reporting','0','https://legiscan.com/NE/bill/LB8/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43738','4ff3c2bdec0e5f1d32cf72495d4e36de','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395531','27','1810','64','64','1','LB80','1','2021-01-07','Change shipping license fees under the Nebraska Liquor Control Act','Change shipping license fees under the Nebraska Liquor Control Act','0','https://legiscan.com/NE/bill/LB80/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44099','e9c39a3c222b22f8b3c4cbbfac061322','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395535','27','1810','64','64','1','LB98','1','2021-01-07','Change provisions relating to agricultural or horticultural land receiving special valuation','Change provisions relating to agricultural or horticultural land receiving special valuation','0','https://legiscan.com/NE/bill/LB98/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43446','bb4119c10386d9f20b075e8fb4d04891','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395537','27','1810','64','64','1','LB87','1','2021-01-07','Provide for mental health first aid training for school districts and change provisions relating to the use of lottery funds','Provide for mental health first aid training for school districts and change provisions relating to the use of lottery funds','0','https://legiscan.com/NE/bill/LB87/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43804','34c7e948b06d7f580dd3d297617d7408','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395541','27','1810','64','64','1','LB95','1','2021-01-07','Change provisions relating to garnishment','Change provisions relating to garnishment','0','https://legiscan.com/NE/bill/LB95/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43582','5dc20ae2729fcbc71deba9d49361a660','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395542','27','1810','64','64','1','LB23','4','2021-03-17','Change provisions of the Real Property Appraiser Act','Change provisions of the Real Property Appraiser Act','0','https://legiscan.com/NE/bill/LB23/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43559','026336065322371f2c9147c608348d6d','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395544','27','1810','64','64','1','LB69','1','2021-01-07','Adopt the Student Loan Repayment Tax Credit Act','Adopt the Student Loan Repayment Tax Credit Act','0','https://legiscan.com/NE/bill/LB69/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43764','ac06d86346cc6d4ab952189c3b01e33d','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395545','27','1810','64','64','1','LB21','4','2021-03-17','Change insurance provisions regarding administrative penalties, health maintenance organizations, and continuing education','Change insurance provisions regarding administrative penalties, health maintenance organizations, and continuing education','0','https://legiscan.com/NE/bill/LB21/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44030','a5980c00f9ded7d5c1e30c46e6c4f919','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395546','27','1810','64','64','1','LB100','4','2021-05-26','Prohibit certain billing practices under the Medical Assistance Act, state intent regarding foster care reimbursement rates increases, and appropriate funds','Prohibit certain billing practices under the Medical Assistance Act, state intent regarding foster care reimbursement rates increases, and appropriate funds','0','https://legiscan.com/NE/bill/LB100/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43944','879769f184ba379f5c177b41d8729bfe','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395548','27','1810','64','64','1','LB61','1','2021-01-07','Provide formal protest procedures for certain state contracts for services','Provide formal protest procedures for certain state contracts for services','0','https://legiscan.com/NE/bill/LB61/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44147','99528285d0c2c9b90d1e14b8b1e493b0','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395550','27','1810','64','64','1','LB35','4','2021-03-31','Change membership provisions for the First Regiment Nebraska Volunteer Infantry at Fort Donelson Committee','Change membership provisions for the First Regiment Nebraska Volunteer Infantry at Fort Donelson Committee','0','https://legiscan.com/NE/bill/LB35/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43473','32985a4253e2975f9280270d2de78f90','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395553','27','1810','64','64','1','LB73','1','2021-01-07','Direct a portion of the proceeds from the Nebraska Racetrack Gaming Act to county agricultural societies','Direct a portion of the proceeds from the Nebraska Racetrack Gaming Act to county agricultural societies','0','https://legiscan.com/NE/bill/LB73/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43849','749a57270316346b5fb5eb246ba38a13','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395556','27','1810','64','64','1','LB12','1','2021-01-07','Require a commuter rail service study by the Department of Transportation','Require a commuter rail service study by the Department of Transportation','0','https://legiscan.com/NE/bill/LB12/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44075','6c1d2a45ba10e52beb4a63a8ff582660','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395558','27','1810','64','64','1','LB64','4','2021-05-26','Change provisions relating to the taxation of social security benefits','Change provisions relating to the taxation of social security benefits','0','https://legiscan.com/NE/bill/LB64/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43651','10071d51d2d41e4c233740d954da847a','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395559','27','1810','64','64','1','LB86','1','2021-01-07','Require registration for the prescription drug monitoring system','Require registration for the prescription drug monitoring system','0','https://legiscan.com/NE/bill/LB86/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43580','bb2eef337bc5b92179bca2cd64efb3f8','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395563','27','1810','64','64','1','LB37','4','2021-04-07','Change and eliminate provisions relating to the state boiler inspector, fee schedules, and powers and duties of the State Fire Marshal','Change and eliminate provisions relating to the state boiler inspector, fee schedules, and powers and duties of the State Fire Marshal','0','https://legiscan.com/NE/bill/LB37/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43895','568c21e6186137b8ef62a5995f5770fa','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395564','27','1810','64','64','1','LB49','1','2021-01-07','Change penalty for use of tobacco or nicotine products by a person under twenty-one years of age','Change penalty for use of tobacco or nicotine products by a person under twenty-one years of age','0','https://legiscan.com/NE/bill/LB49/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43824','14e448a2cd148fb6708702ee6b063d0a','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395566','27','1810','64','64','1','LB74','1','2021-01-07','Eliminate funding for the Nebraska Advantage Microenterprise Tax Credit Act and state intent regarding use of funds','Eliminate funding for the Nebraska Advantage Microenterprise Tax Credit Act and state intent regarding use of funds','0','https://legiscan.com/NE/bill/LB74/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43448','ec1d41dd8377c8a6077267bf1d90f1eb','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395567','27','1810','64','64','1','LB72','1','2021-01-07','Provide for sale of alcoholic liquor not in its original package','Provide for sale of alcoholic liquor not in its original package','0','https://legiscan.com/NE/bill/LB72/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43631','898b969074e111b94cbd771968e7ef97','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395569','27','1810','64','64','1','LB52','1','2021-01-07','Provide for immunity for injury or death resulting from COVID-19 exposure','Provide for immunity for injury or death resulting from COVID-19 exposure','0','https://legiscan.com/NE/bill/LB52/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44084','329a30c16c55010c5043e5343bb93f84','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395572','27','1810','64','64','1','LB97','1','2021-01-07','Change provisions relating to adoptions','Change provisions relating to adoptions','0','https://legiscan.com/NE/bill/LB97/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43542','95765cc7b48cbea37cbbc56e6fd1d59d','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395576','27','1810','64','64','1','LB53','1','2021-01-07','Provide immunity for health care providers acting in conformance with the crisis standard of care during a COVID-19 state of emergency','Provide immunity for health care providers acting in conformance with the crisis standard of care during a COVID-19 state of emergency','0','https://legiscan.com/NE/bill/LB53/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44085','8f79e0062f7d696b3ad8f9f8b6f852fb','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395577','27','1810','64','64','1','LB78','4','2021-04-20','Require applicants for certain license plates to register with the Department of Veterans'' Affairs','Require applicants for certain license plates to register with the Department of Veterans'' Affairs','0','https://legiscan.com/NE/bill/LB78/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43928','2196551b72cffd2636d3ca5acf1242f5','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395578','27','1810','64','64','1','LB19','1','2021-01-07','Change provisions relating to nail technology and body art','Change provisions relating to nail technology and body art','0','https://legiscan.com/NE/bill/LB19/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43740','4ce6f0d4552d55a2f19220e7b9b81b57','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395580','27','1810','64','64','1','LB13','1','2021-01-07','Prohibit possession of a deadly weapon by the subject of a foreign protection order','Prohibit possession of a deadly weapon by the subject of a foreign protection order','0','https://legiscan.com/NE/bill/LB13/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43987','357d11ece5530e6c0a4e567c6ba814bf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395581','27','1810','64','64','1','LB41','4','2021-04-20','Change provisions relating to certain payments of funds to townships','Change provisions relating to certain payments of funds to townships','0','https://legiscan.com/NE/bill/LB41/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43494','6146cbafc08da00507a9aa943e26d3d2','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395584','27','1810','64','64','1','LB27','1','2021-01-07','Provide for appropriations to the Nebraska State Historical Society','Provide for appropriations to the Nebraska State Historical Society','0','https://legiscan.com/NE/bill/LB27/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43990','78e2f1c3eaec975f9d1fb9385ebea438','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395586','27','1810','64','64','1','LB50','1','2021-01-07','Change voice analysis examiner and voice stress analyzer provisions under the Licensing of Truth and Deception Examiners Act','Change voice analysis examiner and voice stress analyzer provisions under the Licensing of Truth and Deception Examiners Act','0','https://legiscan.com/NE/bill/LB50/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43760','f587c617d0cda762a4b992fba4b462f5','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395588','27','1810','64','64','1','LB36','1','2021-01-07','Require display of the national motto in schools','Require display of the national motto in schools','0','https://legiscan.com/NE/bill/LB36/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43961','bda2c2722081d22de8ae8462da1cb2ab','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395589','27','1810','64','64','1','LB40','4','2021-05-26','Adopt the Nebraska Rural Projects Act','Adopt the Nebraska Rural Projects Act','0','https://legiscan.com/NE/bill/LB40/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43595','bd34aa9e80abe176a1e713fa1680dc1a','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395591','27','1810','64','64','1','LB65','4','2021-04-23','Change contractual conflict of interest provisions under the Nebraska Political Accountability and Disclosure Act','Change contractual conflict of interest provisions under the Nebraska Political Accountability and Disclosure Act','0','https://legiscan.com/NE/bill/LB65/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44135','2e6d6be20fd613569e9c3488fe1584d4','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395594','27','1810','64','64','1','LB57','4','2021-05-21','Provide a hearsay exception for present sense impressions','Provide a hearsay exception for present sense impressions','0','https://legiscan.com/NE/bill/LB57/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43551','e7cdb2147b6bb3cc790662819b822611','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395597','27','1810','64','64','1','LB62','1','2021-01-07','Create the Access College Early Scholarship Cash Fund and change provisions relating to the Nebraska Education Improvement Fund, Nebraska Opportunity Grant Fund, and Community College Gap Assistance Program Fund','Create the Access College Early Scholarship Cash Fund and change provisions relating to the Nebraska Education Improvement Fund, Nebraska Opportunity Grant Fund, and Community College Gap Assistance Program Fund','0','https://legiscan.com/NE/bill/LB62/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43553','3c645bccdab3e6392be6cd6c96a95e23','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395598','27','1810','64','64','1','LB68','1','2021-01-07','Change provisions relating to reimbursement for services provided by the federal Child Care Subsidy program','Change provisions relating to reimbursement for services provided by the federal Child Care Subsidy program','0','https://legiscan.com/NE/bill/LB68/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43995','167a2296a0ca619b952187981b8a2f86','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395602','27','1810','64','64','1','LB38','1','2021-01-07','Change provisions relating to tax credits and retaliatory taxes','Change provisions relating to tax credits and retaliatory taxes','0','https://legiscan.com/NE/bill/LB38/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43782','ee5004d5eedac1392837ab0655020143','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395603','27','1810','64','64','1','LB99','1','2021-01-07','Change provisions of the Community Development Law relating to limitations on blighted areas','Change provisions of the Community Development Law relating to limitations on blighted areas','0','https://legiscan.com/NE/bill/LB99/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43577','0bf12c218b3695203680cfdb630b929a','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill" VALUES ('1395604','27','1810','64','64','1','LB4','4','2021-03-17','Change tuition credit provisions for the Active Selected Reserve of the armed forces of the United States','Change tuition credit provisions for the Active Selected Reserve of the armed forces of the United States','0','https://legiscan.com/NE/bill/LB4/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43776','3c45ac9e149dc08e58089077bca18aac','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395606','27','1810','64','64','1','LB9','4','2021-05-05','Change annexation requirements and property tax special valuation provisions','Change annexation requirements and property tax special valuation provisions','0','https://legiscan.com/NE/bill/LB9/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43745','385b2b6a23bdf46f5de09a13407f4bd3','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395608','27','1810','64','64','1','LB91','4','2022-04-20','Change germination seed testing provisions under the Nebraska Seed Law','Change germination seed testing provisions under the Nebraska Seed Law','0','https://legiscan.com/NE/bill/LB91/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=44056','9224447a13720b406bd4fa47ef8f33c0','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395610','27','1810','64','64','1','LB89','1','2021-01-07','Allow persons eighteen years of age to make health care decisions and persons under nineteen years of age in correctional facilities to consent to medical and mental health care','Allow persons eighteen years of age to make health care decisions and persons under nineteen years of age in correctional facilities to consent to medical and mental health care','0','https://legiscan.com/NE/bill/LB89/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43536','47aec54aee4fa61bcf87a30ff8a797f1','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395613','27','1810','64','64','1','LB3','1','2021-01-07','Change notice requirements for school district budget hearings and require access to school district data','Change notice requirements for school district budget hearings and require access to school district data','0','https://legiscan.com/NE/bill/LB3/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43877','0a83b35e4fc95a59dcefddffcc3bc16d','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395615','27','1810','64','64','1','LB7','1','2021-01-07','Provide immunity from arrest and prosecution for witnesses and victims of violent crimes','Provide immunity from arrest and prosecution for witnesses and victims of violent crimes','0','https://legiscan.com/NE/bill/LB7/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43680','dbb3f3bacabe80dccd8aecde23950572','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill" VALUES ('1395617','27','1810','64','64','1','LB47','1','2021-01-07','Change procedures relating to obligees in child support proceedings','Change procedures relating to obligees in child support proceedings','0','https://legiscan.com/NE/bill/LB47/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43861','cda81d801c87c8ac56b542c758f150e7','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill" VALUES ('1395619','27','1810','64','64','1','LB11','1','2021-01-07','Change provisions regarding voter registration and requests for ballots for early voting','Change provisions regarding voter registration and requests for ballots for early voting','0','https://legiscan.com/NE/bill/LB11/2021','https://nebraskalegislature.gov/bills/view_bill.php?DocumentID=43780','947501d3cf146e2cc630c2a0e45a54a0','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_text_type" VALUES ('1','Introduced','2','0');
INSERT INTO "ls_text_type" VALUES ('2','Comm Sub','4','0');
INSERT INTO "ls_text_type" VALUES ('3','Amended','3','0');
INSERT INTO "ls_text_type" VALUES ('4','Engrossed','7','0');
INSERT INTO "ls_text_type" VALUES ('5','Enrolled','8','0');
INSERT INTO "ls_text_type" VALUES ('6','Chaptered','9','0');
INSERT INTO "ls_text_type" VALUES ('7','Fiscal Note','0','1');
INSERT INTO "ls_text_type" VALUES ('8','Analysis','0','1');
INSERT INTO "ls_text_type" VALUES ('9','Draft','1','0');
INSERT INTO "ls_text_type" VALUES ('10','Conference Sub','5','0');
INSERT INTO "ls_text_type" VALUES ('11','Prefiled','0','0');
INSERT INTO "ls_text_type" VALUES ('12','Veto Message','0','1');
INSERT INTO "ls_text_type" VALUES ('13','Veto Response','0','1');
INSERT INTO "ls_text_type" VALUES ('14','Substitute','6','0');
INSERT INTO "ls_sponsor_type" VALUES ('0','Sponsor');
INSERT INTO "ls_sponsor_type" VALUES ('1','Primary Sponsor');
INSERT INTO "ls_sponsor_type" VALUES ('2','Co-Sponsor');
INSERT INTO "ls_sponsor_type" VALUES ('3','Joint Sponsor');
INSERT INTO "ls_type" VALUES ('1','Bill','B');
INSERT INTO "ls_type" VALUES ('2','Resolution','R');
INSERT INTO "ls_type" VALUES ('3','Concurrent Resolution','CR');
INSERT INTO "ls_type" VALUES ('4','Joint Resolution','JR');
INSERT INTO "ls_type" VALUES ('5','Joint Resolution Constitutional Amendment','JRCA');
INSERT INTO "ls_type" VALUES ('6','Executive Order','EO');
INSERT INTO "ls_type" VALUES ('7','Constitutional Amendment','CA');
INSERT INTO "ls_type" VALUES ('8','Memorial','M');
INSERT INTO "ls_type" VALUES ('9','Claim','CL');
INSERT INTO "ls_type" VALUES ('10','Commendation','C');
INSERT INTO "ls_type" VALUES ('11','Committee Study Request','CSR');
INSERT INTO "ls_type" VALUES ('12','Joint Memorial','JM');
INSERT INTO "ls_type" VALUES ('13','Proclamation','P');
INSERT INTO "ls_type" VALUES ('14','Study Request','SR');
INSERT INTO "ls_type" VALUES ('15','Address','A');
INSERT INTO "ls_type" VALUES ('16','Concurrent Memorial','CM');
INSERT INTO "ls_type" VALUES ('17','Initiative','I');
INSERT INTO "ls_type" VALUES ('18','Petition','PET');
INSERT INTO "ls_type" VALUES ('19','Study Bill','SB');
INSERT INTO "ls_type" VALUES ('20','Initiative Petition','IP');
INSERT INTO "ls_type" VALUES ('21','Repeal Bill','RB');
INSERT INTO "ls_type" VALUES ('22','Remonstration','RM');
INSERT INTO "ls_type" VALUES ('23','Committee Bill','CB');
INSERT INTO "ls_state" VALUES ('1','AL','Alabama','0','NO','Montgomery','32.377716','-86.300489');
INSERT INTO "ls_state" VALUES ('2','AK','Alaska','1','OE','Juneau','58.301105','-134.412957');
INSERT INTO "ls_state" VALUES ('3','AZ','Arizona','0','NO','Phoenix','33.448113','-112.097037');
INSERT INTO "ls_state" VALUES ('4','AR','Arkansas','0','NO','Little Rock','34.746361','-92.289422');
INSERT INTO "ls_state" VALUES ('5','CA','California','1','OE','Sacramento','38.576700','-121.493766');
INSERT INTO "ls_state" VALUES ('6','CO','Colorado','0','NO','Denver','39.739276','-104.984848');
INSERT INTO "ls_state" VALUES ('7','CT','Connecticut','0','NO','Hartford','41.762831','-72.682383');
INSERT INTO "ls_state" VALUES ('8','DE','Delaware','1','OE','Dover','39.157354','-75.519570');
INSERT INTO "ls_state" VALUES ('9','FL','Florida','0','NO','Tallahassee','30.438086','-84.282196');
INSERT INTO "ls_state" VALUES ('10','GA','Georgia','1','OE','Atlanta','33.749035','-84.388195');
INSERT INTO "ls_state" VALUES ('11','HI','Hawaii','0','OE','Honolulu','21.294786','-157.858818');
INSERT INTO "ls_state" VALUES ('12','ID','Idaho','0','NO','Boise','43.617850','-116.199940');
INSERT INTO "ls_state" VALUES ('13','IL','Illinois','1','OE','Springfield','39.798358','-89.654972');
INSERT INTO "ls_state" VALUES ('14','IN','Indiana','0','NO','Indianapolis','39.768590','-86.162634');
INSERT INTO "ls_state" VALUES ('15','IA','Iowa','1','OE','Des Moines','41.591183','-93.603694');
INSERT INTO "ls_state" VALUES ('16','KS','Kansas','1','OE','Topeka','39.048070','-95.678080');
INSERT INTO "ls_state" VALUES ('17','KY','Kentucky','0','NO','Frankfort','38.186658','-84.875265');
INSERT INTO "ls_state" VALUES ('18','LA','Louisiana','0','NO','Baton Rouge','30.456615','-91.187356');
INSERT INTO "ls_state" VALUES ('19','ME','Maine','1','OE','Augusta','44.307185','-69.781390');
INSERT INTO "ls_state" VALUES ('20','MD','Maryland','0','NO','Annapolis','38.978862','-76.490685');
INSERT INTO "ls_state" VALUES ('21','MA','Massachusetts','1','OE','Boston','42.358424','-71.063701');
INSERT INTO "ls_state" VALUES ('22','MI','Michigan','1','OE','Lansing','42.733470','-84.555300');
INSERT INTO "ls_state" VALUES ('23','MN','Minnesota','1','OE','Saint Paul','44.948232','-93.105406');
INSERT INTO "ls_state" VALUES ('24','MS','Mississippi','0','NO','Jackson','32.303799','-90.182005');
INSERT INTO "ls_state" VALUES ('25','MO','Missouri','0','NO','Jefferson City','38.579206','-92.173019');
INSERT INTO "ls_state" VALUES ('26','MT','Montana','0','NO','Helena','46.585774','-112.018180');
INSERT INTO "ls_state" VALUES ('27','NE','Nebraska','1','OE','Lincoln','40.807935','-96.699655');
INSERT INTO "ls_state" VALUES ('28','NV','Nevada','0','NO','Carson City','39.164009','-119.766153');
INSERT INTO "ls_state" VALUES ('29','NH','New Hampshire','0','OE','Concord','43.206854','-71.537659');
INSERT INTO "ls_state" VALUES ('30','NJ','New Jersey','1','EO','Trenton','40.220280','-74.770140');
INSERT INTO "ls_state" VALUES ('31','NM','New Mexico','0','NO','Santa Fe','35.682440','-105.940074');
INSERT INTO "ls_state" VALUES ('32','NY','New York','1','OE','Albany','40.771120','-73.974190');
INSERT INTO "ls_state" VALUES ('33','NC','North Carolina','1','OE','Raleigh','35.780498','-78.639110');
INSERT INTO "ls_state" VALUES ('34','ND','North Dakota','1','NO','Bismarck','46.820900','-100.781955');
INSERT INTO "ls_state" VALUES ('35','OH','Ohio','1','OE','Columbus','39.961392','-82.999065');
INSERT INTO "ls_state" VALUES ('36','OK','Oklahoma','0','OE','Oklahoma City','35.492320','-97.503340');
INSERT INTO "ls_state" VALUES ('37','OR','Oregon','0','NO','Salem','44.938361','-123.030155');
INSERT INTO "ls_state" VALUES ('38','PA','Pennsylvania','1','OE','Harrisburg','40.264330','-76.883521');
INSERT INTO "ls_state" VALUES ('39','RI','Rhode Island','0','OE','Providence','41.831097','-71.414883');
INSERT INTO "ls_state" VALUES ('40','SC','South Carolina','1','OE','Columbia','34.000386','-81.033210');
INSERT INTO "ls_state" VALUES ('41','SD','South Dakota','0','NO','Pierre','44.367630','-100.346040');
INSERT INTO "ls_state" VALUES ('42','TN','Tennessee','1','OE','Nashville','36.166011','-86.784297');
INSERT INTO "ls_state" VALUES ('43','TX','Texas','1','NO','Austin','30.274001','-97.740631');
INSERT INTO "ls_state" VALUES ('44','UT','Utah','0','NO','Salt Lake City','40.777200','-111.888280');
INSERT INTO "ls_state" VALUES ('45','VT','Vermont','1','OE','Montpelier','44.262141','-72.580716');
INSERT INTO "ls_state" VALUES ('46','VA','Virginia','0','EO','Richmond','37.538783','-77.433449');
INSERT INTO "ls_state" VALUES ('47','WA','Washington','1','OE','Olympia','47.035964','-122.904799');
INSERT INTO "ls_state" VALUES ('48','WV','West Virginia','0','OE','Charleston','38.336166','-81.612186');
INSERT INTO "ls_state" VALUES ('49','WI','Wisconsin','1','OE','Madison','43.074530','-89.384120');
INSERT INTO "ls_state" VALUES ('50','WY','Wyoming','0','NO','Cheyenne','41.140101','-104.820112');
INSERT INTO "ls_state" VALUES ('51','DC','Washington D.C.','1','OE','Washington, DC','38.894825','-77.031338');
INSERT INTO "ls_state" VALUES ('52','US','US Congress','1','OE','Washington, DC','38.889873','-77.008823');
INSERT INTO "ls_bill_referral" VALUES ('1395419','1','2021-01-11','1441');
INSERT INTO "ls_bill_referral" VALUES ('1395421','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395422','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395423','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395426','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395427','1','2021-01-11','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395429','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395431','1','2021-01-12','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395433','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395436','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395438','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395440','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395442','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395443','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395444','1','2021-01-11','1441');
INSERT INTO "ls_bill_referral" VALUES ('1395448','1','2021-01-11','1436');
INSERT INTO "ls_bill_referral" VALUES ('1395450','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395452','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395453','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395457','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395458','1','2021-01-11','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395460','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395462','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395465','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395466','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395468','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395469','1','2021-01-11','1446');
INSERT INTO "ls_bill_referral" VALUES ('1395470','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395474','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395477','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395479','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395480','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395482','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395483','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395485','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395487','1','2021-01-11','1446');
INSERT INTO "ls_bill_referral" VALUES ('1395489','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395491','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395495','1','2021-01-12','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395496','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395498','1','2021-01-11','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395499','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395501','1','2021-01-11','1437');
INSERT INTO "ls_bill_referral" VALUES ('1395503','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395505','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395508','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395509','1','2021-01-11','1437');
INSERT INTO "ls_bill_referral" VALUES ('1395514','1','2021-01-11','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395516','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395517','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395518','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395520','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395525','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395527','1','2021-01-11','1448');
INSERT INTO "ls_bill_referral" VALUES ('1395528','1','2021-01-11','1446');
INSERT INTO "ls_bill_referral" VALUES ('1395529','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395531','1','2021-01-11','1441');
INSERT INTO "ls_bill_referral" VALUES ('1395535','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395537','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395541','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395542','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395544','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395545','1','2021-01-11','1438');
INSERT INTO "ls_bill_referral" VALUES ('1395546','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395548','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395550','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395553','1','2021-01-11','1441');
INSERT INTO "ls_bill_referral" VALUES ('1395556','1','2021-01-11','1448');
INSERT INTO "ls_bill_referral" VALUES ('1395558','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395559','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395563','1','2021-01-11','1439');
INSERT INTO "ls_bill_referral" VALUES ('1395564','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395566','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395567','1','2021-01-11','1441');
INSERT INTO "ls_bill_referral" VALUES ('1395569','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395572','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395576','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395577','1','2021-01-11','1448');
INSERT INTO "ls_bill_referral" VALUES ('1395578','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395580','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395581','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395584','1','2021-01-11','1437');
INSERT INTO "ls_bill_referral" VALUES ('1395586','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395586','2','2021-01-14','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395588','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395589','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395591','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395594','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395597','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395598','1','2021-01-11','1443');
INSERT INTO "ls_bill_referral" VALUES ('1395602','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395603','1','2021-01-11','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395604','1','2021-01-11','1442');
INSERT INTO "ls_bill_referral" VALUES ('1395606','1','2021-01-11','1447');
INSERT INTO "ls_bill_referral" VALUES ('1395606','2','2021-01-28','1449');
INSERT INTO "ls_bill_referral" VALUES ('1395608','1','2021-01-11','1436');
INSERT INTO "ls_bill_referral" VALUES ('1395610','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395613','1','2021-01-11','1440');
INSERT INTO "ls_bill_referral" VALUES ('1395615','1','2021-01-11','1444');
INSERT INTO "ls_bill_referral" VALUES ('1395617','1','2021-01-11','1444');
INSERT INTO "ls_party" VALUES ('1','D','Dem','Democrat');
INSERT INTO "ls_party" VALUES ('2','R','Rep','Republican');
INSERT INTO "ls_party" VALUES ('3','I','Ind','Independent');
INSERT INTO "ls_party" VALUES ('4','G','Grn','Green Party');
INSERT INTO "ls_party" VALUES ('5','L','Lib','Libertarian');
INSERT INTO "ls_party" VALUES ('6','N','NP','Nonpartisan');
INSERT INTO "ls_bill_sponsor" VALUES ('1395419','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395421','18637','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395422','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395423','18554','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395425','10907','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395426','16742','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395427','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395429','18554','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395431','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395433','16830','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395436','18637','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395438','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395440','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395442','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395443','19004','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395444','20568','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395448','18556','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395450','6948','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395452','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395453','16742','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395457','16612','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395458','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395460','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395462','16830','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395465','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395466','16686','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395468','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395469','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395470','19004','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395474','19282','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395477','22130','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395479','16830','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395480','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395482','18640','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395483','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395485','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395487','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395489','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395491','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395495','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395496','16685','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395498','16741','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395499','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395501','20434','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395503','20434','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395505','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395508','20613','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395509','20434','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395514','20433','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395516','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395517','20568','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395518','16611','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395520','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395525','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395527','16741','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395528','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395529','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395531','18637','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395535','18640','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395537','16611','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395541','20433','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395542','16742','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395544','22130','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395545','16742','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395546','18640','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395548','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395550','16830','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395553','18503','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395556','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395558','16686','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395559','18554','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395563','18504','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395564','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395566','18503','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395567','18503','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395569','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395572','20433','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395576','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395577','20568','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395578','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395580','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395581','20434','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395584','18370','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395586','16831','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395588','18638','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395589','16831','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395591','16742','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395594','6930','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395597','17047','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395598','22130','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395602','16686','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395603','18640','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395604','18637','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395606','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395608','20936','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395610','16611','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395613','18637','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395615','18410','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395617','19683','1','1');
INSERT INTO "ls_bill_sponsor" VALUES ('1395619','18410','1','1');
INSERT INTO "ls_variable" VALUES ('schema','9');
INSERT INTO "ls_variable" VALUES ('version','"1.4.0"');
INSERT INTO "ls_bill_text" VALUES ('2229821','1395419','1','2','2021-01-07','70837','5c6f5355637dce297eb3f33215f9a927','0','','https://legiscan.com/NE/text/LB70/id/2229821','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB70.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229822','1395421','1','2','2021-01-07','57441','7a6252441b6be3e5895253f56a3fa74d','0','','https://legiscan.com/NE/text/LB2/id/2229822','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB2.pdf','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_text" VALUES ('2229823','1395422','1','2','2021-01-07','152378','94406101306034cbab77fef4ea73fa1a','0','','https://legiscan.com/NE/text/LB14/id/2229823','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB14.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229824','1395423','1','2','2021-01-07','66579','bc15ead0c8fa356bf95e6260c48e8aad','0','','https://legiscan.com/NE/text/LB84/id/2229824','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB84.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229825','1395425','1','2','2021-01-07','58666','ac11aec691a41f75191d6e2210a47160','0','','https://legiscan.com/NE/text/LB1/id/2229825','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB1.pdf','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_text" VALUES ('2229826','1395426','1','2','2021-01-07','127713','927116d9018e9cd2f9049553a68c8ed8','0','','https://legiscan.com/NE/text/LB22/id/2229826','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB22.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229827','1395427','1','2','2021-01-07','53365','c4205a54f5b04a23cd267512a306fb9d','0','','https://legiscan.com/NE/text/LB44/id/2229827','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB44.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229828','1395429','1','2','2021-01-07','52226','373f1f7ffde5714470872bc37c4f6972','0','','https://legiscan.com/NE/text/LB85/id/2229828','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB85.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229829','1395431','1','2','2021-01-07','49606','632805041a13eea765f2fc30a822dd8c','0','','https://legiscan.com/NE/text/LB45/id/2229829','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB45.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229830','1395433','1','2','2021-01-07','134558','628945762846727e6da438b7de99ba7b','0','','https://legiscan.com/NE/text/LB32/id/2229830','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB32.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229832','1395436','1','2','2021-01-07','57430','128495ec7a1945d12aad18e580d47d25','0','','https://legiscan.com/NE/text/LB79/id/2229832','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB79.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229833','1395438','1','2','2021-01-07','54520','aebe799a1d136731d7cdbbb5fe6ce4d6','0','','https://legiscan.com/NE/text/LB10/id/2229833','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB10.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229834','1395440','1','2','2021-01-07','100162','eb2cdce5886f27f3350ebff08250d5bf','0','','https://legiscan.com/NE/text/LB60/id/2229834','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB60.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229835','1395442','1','2','2021-01-07','51959','8ac3cdb19feaf3c987368f949daee782','0','','https://legiscan.com/NE/text/LB30/id/2229835','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB30.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229836','1395443','1','2','2021-01-07','51890','a1635d50cc8a6699a04c571b841c36d7','0','','https://legiscan.com/NE/text/LB94/id/2229836','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB94.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229837','1395444','1','2','2021-01-07','57564','39693bc2a85c7761aae94da6ee70ca3a','0','','https://legiscan.com/NE/text/LB75/id/2229837','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB75.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229839','1395448','1','2','2021-01-07','58494','63c4628dc1b1cec5795c8a59dfec964f','0','','https://legiscan.com/NE/text/LB90/id/2229839','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB90.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229841','1395450','1','2','2021-01-07','54290','992877ced33d15914f4dd58c138d71b4','0','','https://legiscan.com/NE/text/LB58/id/2229841','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB58.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229842','1395452','1','2','2021-01-07','114853','320e948a46dcfb269e39f214a7f4e58d','0','','https://legiscan.com/NE/text/LB43/id/2229842','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB43.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229843','1395453','1','2','2021-01-07','85066','e038614ede78efdb98565c9793f34534','0','','https://legiscan.com/NE/text/LB66/id/2229843','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB66.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229846','1395457','1','2','2021-01-07','54765','5cd00045c55448b3c53ea2abb91707b2','0','','https://legiscan.com/NE/text/LB59/id/2229846','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB59.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229847','1395458','1','2','2021-01-07','62706','5b668f66735b9679d05afc2bba48a1bb','0','','https://legiscan.com/NE/text/LB25/id/2229847','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB25.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229848','1395460','1','2','2021-01-07','55771','ee42def77dd47e1f141c887b0938b55a','0','','https://legiscan.com/NE/text/LB31/id/2229848','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB31.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229849','1395462','1','2','2021-01-07','75328','8cb2312fe1f88f3024d7d99f7f46eef5','0','','https://legiscan.com/NE/text/LB34/id/2229849','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB34.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229850','1395465','1','2','2021-01-07','71380','396b5ddc98b52142eb337d1e24f67214','0','','https://legiscan.com/NE/text/LB6/id/2229850','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB6.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229851','1395466','1','2','2021-01-07','54964','35e29e19eac6dce6c4f4050b2fefcc8d','0','','https://legiscan.com/NE/text/LB63/id/2229851','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB63.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229852','1395468','1','2','2021-01-07','55820','4a58fddbccd9a50045ab9a5dd8050d4d','0','','https://legiscan.com/NE/text/LB5/id/2229852','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB5.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229853','1395469','1','2','2021-01-07','95230','e7f35d9712d1e5ec1244bbf4168ebe27','0','','https://legiscan.com/NE/text/LB24/id/2229853','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB24.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229854','1395470','1','2','2021-01-07','51953','a8429cd68a1870c3b84b6bde65dc6adc','0','','https://legiscan.com/NE/text/LB93/id/2229854','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB93.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229856','1395474','1','2','2021-01-07','58722','4403f2106793aa378a727aaba9f84561','0','','https://legiscan.com/NE/text/LB92/id/2229856','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB92.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229858','1395477','1','2','2021-01-07','55261','01d9631b781bdcd310347483a07fbc73','0','','https://legiscan.com/NE/text/LB67/id/2229858','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB67.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229859','1395479','1','2','2021-01-07','54370','f84b2282da5ca8c944bb7ab215184f8f','0','','https://legiscan.com/NE/text/LB33/id/2229859','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB33.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229860','1395480','1','2','2021-01-07','57146','d9e5966c5dead04e4593262a88758fa5','0','','https://legiscan.com/NE/text/LB29/id/2229860','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB29.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229861','1395482','1','2','2021-01-07','50744','68b46f521ed7da21d8d4bd66c82a8058','0','','https://legiscan.com/NE/text/LB101/id/2229861','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB101.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229862','1395483','1','2','2021-01-07','60074','df00e9ab4a1c501165212804c0b466ba','0','','https://legiscan.com/NE/text/LB18/id/2229862','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB18.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229863','1395485','1','2','2021-01-07','55835','7108f72ab7416b8326316b0c9c02c605','0','','https://legiscan.com/NE/text/LB28/id/2229863','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB28.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229864','1395487','1','2','2021-01-07','65552','c5b27c9a9c249baf354a7be0c30af77a','0','','https://legiscan.com/NE/text/LB16/id/2229864','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB16.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229865','1395489','1','2','2021-01-07','51581','dd24b7385699ed85338dc9e14dee9cd4','0','','https://legiscan.com/NE/text/LB48/id/2229865','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB48.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229867','1395491','1','2','2021-01-07','80342','a7e817640a8a3afe9b7d8135de8d3969','0','','https://legiscan.com/NE/text/LB71/id/2229867','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB71.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229869','1395495','1','2','2021-01-07','53642','7df5ac90a00c6d35d14169d8df67d922','0','','https://legiscan.com/NE/text/LB46/id/2229869','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB46.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229870','1395496','1','2','2021-01-07','51642','4a19b06c4b7ab0748363add5cb0c22b3','0','','https://legiscan.com/NE/text/LB104/id/2229870','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB104.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229871','1395498','1','2','2021-01-07','115501','8a95731c203a4cbc3e7dccc92e70003d','0','','https://legiscan.com/NE/text/LB81/id/2229871','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB81.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229872','1395499','1','2','2021-01-07','176595','4230ac6bb9417d4e427feeb84224556f','0','','https://legiscan.com/NE/text/LB51/id/2229872','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB51.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229874','1395501','1','2','2021-01-07','52123','04262a168353e4039558decab1a5fefb','0','','https://legiscan.com/NE/text/LB42/id/2229874','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB42.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229875','1395503','1','2','2021-01-07','97815','579e72085c5149a28f3a39fbfbd693a9','0','','https://legiscan.com/NE/text/LB102/id/2229875','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB102.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229876','1395505','1','2','2021-01-07','51665','8b6a0d7c93d678ad9fe643b1c8e7fdfe','0','','https://legiscan.com/NE/text/LB55/id/2229876','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB55.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229878','1395508','1','2','2021-01-07','60394','80194405a4c4b30a0497e4cbc4037efc','0','','https://legiscan.com/NE/text/LB76/id/2229878','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB76.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229879','1395509','1','2','2021-01-07','51928','8a9e095d1c513009d04b776abc9e185f','0','','https://legiscan.com/NE/text/LB103/id/2229879','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB103.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229881','1395514','1','2','2021-01-07','54245','cf713e8f2ecca94cfb35a09501137d46','0','','https://legiscan.com/NE/text/LB96/id/2229881','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB96.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229882','1395516','1','2','2021-01-07','58209','60ff18ebd2c8e9d167f8110c506ef27c','0','','https://legiscan.com/NE/text/LB56/id/2229882','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB56.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229883','1395517','1','2','2021-01-07','73083','67baf61bcc237d86cf3e97143a7ae352','0','','https://legiscan.com/NE/text/LB77/id/2229883','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB77.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229884','1395518','1','2','2021-01-07','63418','0e9d7a6d417f1ea4d12291143ed10d14','0','','https://legiscan.com/NE/text/LB88/id/2229884','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB88.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229885','1395520','1','2','2021-01-07','143743','7d883d160d839c5267d7139c10c3f49d','0','','https://legiscan.com/NE/text/LB15/id/2229885','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB15.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229889','1395525','1','2','2021-01-07','54718','d6c080070cb2f0dbecee127622393b58','0','','https://legiscan.com/NE/text/LB20/id/2229889','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB20.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229890','1395527','1','2','2021-01-07','59126','07ddbcd08d00e79c67478a64abc403d7','0','','https://legiscan.com/NE/text/LB82/id/2229890','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB82.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229891','1395528','1','2','2021-01-07','124647','95f9ffe5cdf2f7939915ad597e241d9e','0','','https://legiscan.com/NE/text/LB17/id/2229891','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB17.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229892','1395529','1','2','2021-01-07','68972','dafe7b46568b1319b9851d6e9498885a','0','','https://legiscan.com/NE/text/LB8/id/2229892','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB8.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229893','1395531','1','2','2021-01-07','53043','a72040e73df0030c85fa4a1a53ffbebe','0','','https://legiscan.com/NE/text/LB80/id/2229893','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB80.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229895','1395535','1','2','2021-01-07','58054','0986743cd4ea7ba772aaaae98fc071bd','0','','https://legiscan.com/NE/text/LB98/id/2229895','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB98.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229896','1395537','1','2','2021-01-07','70347','7d8ce4fa07f240383a3a49e0258dd4d9','0','','https://legiscan.com/NE/text/LB87/id/2229896','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB87.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229899','1395541','1','2','2021-01-07','64022','206f9125b1077855fe8d187f6a4795d0','0','','https://legiscan.com/NE/text/LB95/id/2229899','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB95.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229900','1395542','1','2','2021-01-07','97074','00d8c5b83a998d474fea726cc02653f8','0','','https://legiscan.com/NE/text/LB23/id/2229900','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB23.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229901','1395544','1','2','2021-01-07','91211','d65e8b1026b6693d93b0a10fbb9d50b7','0','','https://legiscan.com/NE/text/LB69/id/2229901','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB69.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229902','1395545','1','2','2021-01-07','68305','09f025ecbc461990c5af6d298021ace8','0','','https://legiscan.com/NE/text/LB21/id/2229902','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB21.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229903','1395546','1','2','2021-01-07','51758','bc5bb4d7b2b501fdbf028d17bd7aa649','0','','https://legiscan.com/NE/text/LB100/id/2229903','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB100.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229904','1395548','1','2','2021-01-07','54983','9d16e5b6b5e4ca0e904f4c92cdd751ad','0','','https://legiscan.com/NE/text/LB61/id/2229904','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB61.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229906','1395550','1','2','2021-01-07','53646','9ddd9da5d0bcba4a36cd3bddd16dabd9','0','','https://legiscan.com/NE/text/LB35/id/2229906','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB35.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229907','1395553','1','2','2021-01-07','52488','f4f4b9c010d562f3a6378c39e6bf868e','0','','https://legiscan.com/NE/text/LB73/id/2229907','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB73.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229909','1395556','1','2','2021-01-07','49817','ab568a1798870a758da36d0ab59ad0a5','0','','https://legiscan.com/NE/text/LB12/id/2229909','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB12.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229910','1395558','1','2','2021-01-07','72809','b9c3e8316e2022665356025405ef74c4','0','','https://legiscan.com/NE/text/LB64/id/2229910','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB64.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229911','1395559','1','2','2021-01-07','76087','156b5295e49232f770baa07074d50cac','0','','https://legiscan.com/NE/text/LB86/id/2229911','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB86.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229913','1395563','1','2','2021-01-07','68050','b7185d1a364f169715060477b3408d4e','0','','https://legiscan.com/NE/text/LB37/id/2229913','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB37.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229914','1395564','1','2','2021-01-07','51289','6975fc5fcf1b467029ace43450cc5886','0','','https://legiscan.com/NE/text/LB49/id/2229914','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB49.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229915','1395566','1','2','2021-01-07','65590','758ab43d07e582331018e867df23e22e','0','','https://legiscan.com/NE/text/LB74/id/2229915','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB74.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229916','1395567','1','2','2021-01-07','62139','f0cf45ff38f61d7a49c68ea3f2eb679d','0','','https://legiscan.com/NE/text/LB72/id/2229916','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB72.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229917','1395569','1','2','2021-01-07','51515','30bc43d0bfacd16387e793fcad5c3cf5','0','','https://legiscan.com/NE/text/LB52/id/2229917','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB52.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229919','1395572','1','2','2021-01-07','104460','7f7f1ca014f6e2347699a091f1421f2c','0','','https://legiscan.com/NE/text/LB97/id/2229919','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB97.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229921','1395576','1','2','2021-01-07','52826','a586cfc406f8c390ce012dc8832dab03','0','','https://legiscan.com/NE/text/LB53/id/2229921','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB53.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229922','1395577','1','2','2021-01-07','78109','82c1e0619b71dd70241981e965383b0e','0','','https://legiscan.com/NE/text/LB78/id/2229922','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB78.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229923','1395578','1','2','2021-01-07','107840','25c98ae08406429816d7ff0c0bb94df6','0','','https://legiscan.com/NE/text/LB19/id/2229923','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB19.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229924','1395580','1','2','2021-01-07','56350','798f8cd15223ca953f5029447ccd349f','0','','https://legiscan.com/NE/text/LB13/id/2229924','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB13.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229925','1395581','1','2','2021-01-07','56260','19ede159cdd598c89a775c6292f6609b','0','','https://legiscan.com/NE/text/LB41/id/2229925','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB41.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229926','1395584','1','2','2021-01-07','50258','b589bcb5666344577b7a5cdc9f068723','0','','https://legiscan.com/NE/text/LB27/id/2229926','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB27.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229927','1395586','1','2','2021-01-07','77238','52b33bc363f5fa536466af537f0bbe9c','0','','https://legiscan.com/NE/text/LB50/id/2229927','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB50.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229928','1395588','1','2','2021-01-07','51341','2412654b24ce74f9e13b9b42496cac56','0','','https://legiscan.com/NE/text/LB36/id/2229928','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB36.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229929','1395589','1','2','2021-01-07','77633','282e7f3d92c31f350794c851a6e3dbb3','0','','https://legiscan.com/NE/text/LB40/id/2229929','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB40.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229930','1395591','1','2','2021-01-07','58074','2f1e07c6ad0b0d3789c81a109a619ac7','0','','https://legiscan.com/NE/text/LB65/id/2229930','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB65.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229932','1395594','1','2','2021-01-07','64902','bfd4a403793b8656cc8e9a470579d390','0','','https://legiscan.com/NE/text/LB57/id/2229932','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB57.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229934','1395597','1','2','2021-01-07','74028','cbe31dc7d4a0332da33b9492eb83a81d','0','','https://legiscan.com/NE/text/LB62/id/2229934','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB62.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229935','1395598','1','2','2021-01-07','56211','c527fca28929e32c39a60a912115466f','0','','https://legiscan.com/NE/text/LB68/id/2229935','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB68.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229937','1395602','1','2','2021-01-07','57409','9ed3b9524180041730ef17e6ad3f1f60','0','','https://legiscan.com/NE/text/LB38/id/2229937','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB38.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229938','1395603','1','2','2021-01-07','66881','546725f46293fb7cc95408027eb9620a','0','','https://legiscan.com/NE/text/LB99/id/2229938','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB99.pdf','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_text" VALUES ('2229939','1395604','1','2','2021-01-07','55742','eb1b5440aef9ca2597a5dad363b44471','0','','https://legiscan.com/NE/text/LB4/id/2229939','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB4.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229940','1395606','1','2','2021-01-07','54807','89884bd030ed49b19da179574686ae4e','0','','https://legiscan.com/NE/text/LB9/id/2229940','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB9.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229941','1395608','1','2','2021-01-07','106831','1dc4574644b14d5841ce49eafc0fefc5','0','','https://legiscan.com/NE/text/LB91/id/2229941','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB91.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229942','1395610','1','2','2021-01-07','53493','ec31fbf937863b2ea976ccc30a70e9f1','0','','https://legiscan.com/NE/text/LB89/id/2229942','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB89.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229944','1395613','1','2','2021-01-07','56083','dd7799dfb5878d85765ad7a1bb6638e5','0','','https://legiscan.com/NE/text/LB3/id/2229944','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB3.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229945','1395615','1','2','2021-01-07','80713','8fd69e7ed05b721995e28f1383a7f3ac','0','','https://legiscan.com/NE/text/LB7/id/2229945','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB7.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_text" VALUES ('2229946','1395617','1','2','2021-01-07','63838','aa72a455b585ed360e0235011a505a97','0','','https://legiscan.com/NE/text/LB47/id/2229946','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB47.pdf','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_text" VALUES ('2229948','1395619','1','2','2021-01-07','78920','38eae2742abe4ccb443f514956381948','0','','https://legiscan.com/NE/text/LB11/id/2229948','https://nebraskalegislature.gov/FloorDocs/107/PDF/Intro/LB11.pdf','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_role" VALUES ('1','Representative','Rep');
INSERT INTO "ls_role" VALUES ('2','Senator','Sen');
INSERT INTO "ls_role" VALUES ('3','Joint Conference','Jnt');
INSERT INTO "ls_people" VALUES ('6930','27','2','6','Steve Lathrop','Steve','','Lathrop','','','SD-012','0','Steve_Lathrop','6561846','58471','251535','','x1nbhrl8','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('6931','27','2','6','Mike Flood','Mike','','Flood','','','SD-019','0','Mike_Flood','6560805','41983','227029','','zdo3nhi9','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('6947','27','2','0','Nebraska Retirement Systems Committee','','','','','','','1446','','0','0','0','','z201tkl5','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_people" VALUES ('6948','27','2','6','Rich Pahls','Rich','','Pahls','','','SD-031','0','Rich_Pahls','6560883','41912','228294','','iuwinpl1','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('6954','27','2','0','Urban Affairs Committee','','','','','','','1449','','0','0','0','','0hg1dead','2022-09-21 02:22:00','2022-09-21 02:22:00');
INSERT INTO "ls_people" VALUES ('6956','27','2','0','Revenue Committee','','','','','','','1447','','0','0','0','','xvs7n4x3','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_people" VALUES ('6964','27','2','0','Natural Resources Committee','','','','','','','1445','','0','0','0','','8twybi9y','2022-09-21 02:22:20','2022-09-21 02:22:20');
INSERT INTO "ls_people" VALUES ('6965','27','2','0','Business and Labor Committee','','','','','','','1439','','0','0','0','','zncnqmb8','2022-09-21 02:22:08','2022-09-21 02:22:08');
INSERT INTO "ls_people" VALUES ('10907','27','2','0','Executive Board','Executive','','Board','','','','2196','','0','0','0','','mz6wsec2','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('10908','27','2','0','Education Committee','','','','','','','1440','','0','0','0','','jtlm5gln','2022-09-21 02:22:18','2022-09-21 02:22:18');
INSERT INTO "ls_people" VALUES ('10980','27','2','0','Health and Human Services Committee','','','','','','','1443','','0','0','0','','7v5o2tei','2022-09-21 02:22:05','2022-09-21 02:22:05');
INSERT INTO "ls_people" VALUES ('12577','27','2','0','Redistricting Committee','Redistricting','','Committee','','','','3119','','0','0','0','','sg5dunu0','2022-09-21 02:22:21','2022-09-21 02:22:19');
INSERT INTO "ls_people" VALUES ('13761','27','2','0','Legislative Performance Audit Committee','','','','','','','2652','','0','0','0','','ye57y1l6','2022-09-21 02:22:17','2022-09-21 02:22:17');
INSERT INTO "ls_people" VALUES ('16611','27','2','6','Adam Morfeld','Adam','','Morfeld','','','SD-046','0','Adam_Morfeld','23353788','148487','478196','','s2fnzzwb','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16612','27','2','6','John Stinner','John','P.','Stinner','','','SD-048','0','John_Stinner_Sr.','23353790','148491','486041','','4na6d7pt','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16685','27','2','6','Curt Friesen','Curt','','Friesen','','','SD-034','0','Curt_Friesen','13012804','56767','486030','','rj4r98rv','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16686','27','2','6','Brett Lindstrom','Brett','','Lindstrom','','','SD-018','0','Brett_Lindstrom','17658172','135498','378662','','90ib8r3h','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16687','27','2','6','John McCollister','John','S.','McCollister','','','SD-020','0','John_McCollister','6664314','148465','478192','','ksuox05h','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16741','27','2','6','Robert Hilkemann','Robert','Bob','Hilkemann','','','SD-004','0','Bob_Hilkemann','23353738','149583','486013','','p0olgcjt','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16742','27','2','6','Matt Williams','Matt','','Williams','','','SD-036','0','Matt_Williams_(Nebraska)','23353780','148478','486032','','dfe0b5sd','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16829','27','2','6','Dan Hughes','Dan','','Hughes','','','SD-044','0','Dan_Hughes_(Nebraska)','9906671','148485','486037','','u6vpsqsl','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16830','27','2','6','Patty Pansing Brooks','Patty','','Pansing Brooks','','','SD-028','0','Patty_Pansing_Brooks','23350931','149791','487896','','nvfynmlw','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('16831','27','2','6','Michael Groene','Michael','','Groene','','','SD-042','0','Mike_Groene','9918175','150201','498294','','82p7zy75','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('17047','27','2','6','Mark Kolterman','Mark','A.','Kolterman','','','SD-024','0','Mark_Kolterman','23353766','148466','486025','','xulm4t3l','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18369','27','2','6','Michael Hilgers','Michael','','Hilgers','','Mike','SD-021','0','Mike_Hilgers','10238619','135520','389342','','mhtsoolg','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18370','27','2','6','Justin Wayne','Justin','','Wayne','','','SD-013','0','Justin_T._Wayne','39451304','167676','570209','','l2cdwwcs','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18410','27','2','6','Carol Blood','Carol','','Blood','','','SD-003','0','Carol_Blood','23353086','111878','485684','','svsszuqv','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18503','27','2','6','Suzanne Geist','Suzanne','','Geist','','','SD-025','0','Suzanne_Geist','26791733','167686','568791','','bsunkraw','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18504','27','2','6','John Lowe','John','S.','Lowe','Sr.','','SD-037','0','John_Lowe','39451329','169559','572868','','yff2qqmx','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18505','27','2','6','Tony Vargas','Tony','','Vargas','','','SD-007','0','Tony_Vargas','39451297','167674','570208','','t3jzytde','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18553','27','2','6','Joni Albrecht','Joni','','Albrecht','','','SD-017','0','Joni_Albrecht','39451309','167679','570597','','w55u4qcz','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18554','27','2','6','Bruce Bostelman','Bruce','','Bostelman','','','SD-023','0','Bruce_Bostelman','39451315','167963','572865','','dn2nv66e','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18555','27','2','6','Tom Brewer','Tom','','Brewer','','','SD-043','0','Tom_Brewer','23353795','149581','483567','','zcj29pfr','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18556','27','2','6','Steve Halloran','Steve','','Halloran','','','SD-033','0','Steve_Halloran','39451325','32415','564692','','slzyb1iy','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18558','27','2','6','Anna Wishart','Anna','','Wishart','','','SD-027','0','Anna_Wishart','39451319','167687','353694','','dilgnulw','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18637','27','2','6','Tom Briese','Tom','','Briese','','','SD-041','0','Tom_Briese','26792929','167696','566559','','6pzreo7s','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18638','27','2','6','Steve Erdman','Steve','','Erdman','','','SD-047','0','Steve_Erdman','39451334','90826','562782','','3z6yhxq9','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18639','27','2','6','Lou Linehan','Lou','Ann','Linehan','','','SD-039','0','Lou_Ann_Linehan','28182483','167694','567037','','ov6w6g01','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18640','27','2','6','Lynne Walz','Lynne','M.','Walz','','','SD-015','0','Lynne_Walz','39451307','167677','564691','','hzd22q2f','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('18982','27','2','6','Mike McDonnell','Mike','','McDonnell','','','SD-005','0','Mike_McDonnell','9926532','167673','569525','','xori7gb3','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('19004','27','2','0','Government, Military and Veterans Affairs','','','','','','','1442','','0','0','0','','uwpdj5gi','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_people" VALUES ('19282','27','2','6','Robert Clements','Robert','','Clements','','','SD-002','0','Robert_Clements','6757500','176142','615180','','sublfnmu','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('19683','27','2','6','Matt Hansen','Matt','','Hansen','','','SD-026','0','Matt_Hansen','23353768','149789','486026','','4b340fkg','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20431','27','2','6','John Arch','John','','Arch','','','SD-014','0','John_Arch','44178150','179840','654589','','1jjhjbf1','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20432','27','2','6','Machaela Cavanaugh','Machaela','','Cavanaugh','','','SD-006','0','Machaela_Cavanaugh','44893463','179833','654582','','bmgvtmyw','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20433','27','2','6','Wendy DeBoer','Wendy','','DeBoer','','','SD-010','0','Wendy_DeBoer','44893471','179837','654585','','xcloagq1','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20434','27','2','6','Myron Dorn','Myron','','Dorn','','','SD-030','0','Myron_Dorn','29205887','133023','651073','','8kz5gcpw','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20435','27','2','6','Ben Hansen','Ben','','Hansen','','','SD-016','0','Ben_Hansen','44893474','179841','656526','','gbl4oi23','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20537','27','2','6','Megan Hunt','Megan','','Hunt','','','SD-008','0','Megan_Hunt','44893467','179835','647310','','ul57lvdh','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20568','27','2','6','Timothy Gragert','Timothy','J.','Gragert','','','SD-040','0','Timothy_J._Gragert','44893492','179860','654594','','r43rf21l','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20613','27','2','6','Julie Slama','Julie','','Slama','','','SD-001','0','Julie_Slama','47033110','186022','693186','','v7236cnb','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20799','27','2','6','Mike Moser','Mike','','Moser','','','SD-022','0','Mike_Moser','6566835','119308','292336','','izsvsj45','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20820','27','2','6','Dave Murman','Dave','','Murman','','','SD-038','0','Dave_Murman','44893488','179857','658053','','awoblee8','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('20936','27','2','6','Tom Brandt','Tom','','Brandt','','','SD-032','0','Tom_Brandt','44893483','179853','658050','','mm78kiv9','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22130','27','2','6','Jen Day','Jen','','Day','','','SD-049','0','Jen_Day_(Nebraska)','49286792','190121','731967','','9in48duo','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22137','27','2','6','John Cavanaugh','John','','Cavanaugh','','','SD-009','0','John_Cavanaugh','49286751','190087','422119','','lnw9hum3','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22138','27','2','6','Terrell McKinney','Terrell','','McKinney','','','SD-011','0','Terrell_McKinney','49286753','190089','731957','','8ip5cft6','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22260','27','2','6','Raymond Aguilar','Raymond','M.','Aguilar','','Ray','SD-035','0','Raymond_Aguilar','49857077','2213','196858','','q9kw62ie','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22282','27','2','6','Eliot Bostar','Eliot','','Bostar','','','SD-029','0','Eliot_Bostar','49286773','190110','731962','','igiri6r2','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('22355','27','2','6','Rita Sanders','Rita','','Sanders','','','SD-045','0','Rita_Sanders','49286790','132954','734194','','n5jpf1sn','2022-09-21 02:22:21','2022-09-21 02:21:56');
INSERT INTO "ls_people" VALUES ('23101','27','2','6','Michael Jacobson','Michael','','Jacobson','','Mike','SD-042','0','Michael_Jacobson','6564402','103150','412264','','zaph0nov','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_session" VALUES ('1810','27','2021','2022','0','1','0','0','107th Legislature','2021-2022 Regular Session','Regular Session','2022-09-18','03f432db1466c3533e9b995b7954ba5e');
INSERT INTO "ls_session" VALUES ('1851','27','2021','2021','0','1','1','1','107th Legislature 1st Special Session','2021 1st Special Session','1st Special Session','','');
INSERT INTO "ls_bill_calendar" VALUES ('1395419','1e928f5f','1','2021-01-25','09:30:00','Room 1510','General Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395421','6b877e32','1','2021-02-10','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:56','2022-09-21 02:21:56');
INSERT INTO "ls_bill_calendar" VALUES ('1395422','17a749bb','1','2021-01-27','13:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395423','bf71663c','1','2021-02-26','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395426','afc66b64','1','2021-01-25','09:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395427','9bcabb0f','1','2021-01-26','13:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395429','92cecacf','1','2021-03-03','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395431','8148ca32','1','2021-01-27','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395433','ad5a33da','1','2021-02-17','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395436','859ef19b','1','2021-02-10','13:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395438','05d4f004','1','2021-01-29','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395440','93fda2a4','1','2021-02-01','13:30:00','Room 1525','Education Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395442','6416b750','1','2021-03-01','13:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395443','0157ea87','1','2021-01-29','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395444','1e928f5f','1','2021-01-25','09:30:00','Room 1510','General Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395448','99bb26c4','1','2021-01-26','13:30:00','Room 1524','Agriculture Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395450','964856d3','1','2021-03-04','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395452','fd9b100b','1','2021-01-28','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395453','c69b5e75','1','2021-01-26','09:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395457','ea3a29e7','1','2021-02-03','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395458','9bcabb0f','1','2021-01-26','13:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395460','0810def0','1','2021-03-10','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395462','ad5a33da','1','2021-02-17','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395465','05d4f004','1','2021-01-29','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395466','859ef19b','1','2021-02-10','13:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395468','f4e01f23','1','2021-02-23','09:30:00','Room 1525','Education Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395469','c6de6782','1','2021-02-09','12:00:00','Room 1525','Nebraska Retirement Systems Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395470','0157ea87','1','2021-01-29','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395474','6af9bd4f','1','2021-01-26','13:30:00','Room 1525','Education Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395477','cab92b5b','1','2021-02-18','13:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395479','ad5a33da','1','2021-02-17','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395480','73628ac5','1','2021-03-03','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395482','07b1eb05','1','2021-01-28','09:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395483','bf71663c','1','2021-02-26','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395485','1680c544','1','2021-01-29','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395487','c6de6782','1','2021-02-09','12:00:00','Room 1525','Nebraska Retirement Systems Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395489','113f8848','1','2021-01-29','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395491','ab08430a','1','2021-02-18','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395495','8148ca32','1','2021-01-27','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395496','cfd9b1bd','1','2021-02-24','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395498','ba6eab56','1','2021-02-16','13:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395499','5d066f7d','1','2021-02-03','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395501','f04a7c12','1','2021-02-26','13:30:00','Room 1525','Appropriations Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395503','67988c36','1','2021-02-25','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395508','b756ea6e','1','2021-02-17','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395509','0502aeb3','1','2021-02-19','09:30:00','Room 1525','Appropriations Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395514','ba6eab56','1','2021-02-16','13:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395516','f9160e04','1','2021-02-17','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395517','719d92c3','1','2021-01-25','13:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395518','1680c544','1','2021-01-29','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395520','343f64d7','1','2021-01-28','13:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395525','6416b750','1','2021-03-01','13:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395527','29f06e2a','1','2021-01-26','09:30:00','room 1113','Transportation and Telecommunications Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395528','286f1aba','1','2021-01-27','12:00:00','Room 1525','Nebraska Retirement Systems Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395529','40e9a7fc','1','2021-03-04','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395531','5baa33f4','1','2021-02-08','09:30:00','Room 1510','General Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395535','6b877e32','1','2021-02-10','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395537','dc20442d','1','2021-03-02','13:30:00','Room 1525','Education Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395541','964856d3','1','2021-03-04','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395542','1aa0f97a','1','2021-01-26','13:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395544','15fb5e48','1','2021-01-28','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395545','afc66b64','1','2021-01-25','09:30:00','Room 1507','Banking, Commerce and Insurance Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395546','07b1eb05','1','2021-01-28','09:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395548','a10c51d2','1','2021-03-04','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395550','0157ea87','1','2021-01-29','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395553','57cd7263','1','2021-02-01','09:30:00','Room 1510','General Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395556','92a49059','1','2021-03-01','13:30:00','Room 1113','Transportation and Telecommunications Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395558','2eadd7c5','1','2021-02-25','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395559','8d12c6bf','1','2021-02-10','13:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395563','48ff0c9e','1','2021-01-25','09:30:00','Room 1524','Business and Labor Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395564','964856d3','1','2021-03-04','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395566','7e7f77fb','1','2021-02-04','13:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395567','5baa33f4','1','2021-02-08','09:30:00','Room 1510','General Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395569','ab08430a','1','2021-02-18','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395572','1680c544','1','2021-01-29','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395576','0b7152c5','1','2021-02-18','13:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395577','cfdd6990','1','2021-01-25','13:30:00','Room 1113','Transportation and Telecommunications Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395578','343f64d7','1','2021-01-28','13:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395580','92cecacf','1','2021-03-03','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395581','62fe537a','1','2021-02-04','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395584','f04a7c12','1','2021-02-26','13:30:00','Room 1525','Appropriations Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395586','17492d12','1','2021-02-03','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395588','dc20442d','1','2021-03-02','13:30:00','Room 1525','Education Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395589','794739f7','1','2021-02-18','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395591','4d01b1fd','1','2021-02-10','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395594','113f8848','1','2021-01-29','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395597','dc20442d','1','2021-03-02','13:30:00','Room 1525','Education Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395598','c42b88bb','1','2021-02-10','09:30:00','Room 1510','Health and Human Services Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395602','af43b5b6','1','2021-02-04','09:30:00','Room 1524','Revenue Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395603','9bcabb0f','1','2021-01-26','13:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395604','c76f950e','1','2021-01-27','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395606','3c594495','1','2021-02-09','09:30:00','Room 1510','Urban Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395608','99bb26c4','1','2021-01-26','13:30:00','Room 1524','Agriculture Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395610','5876ae84','1','2021-01-28','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395613','e1c6d770','1','2021-02-02','09:30:00','Room 1525','Education Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395615','9e0cbd5e','1','2021-02-05','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395617','113f8848','1','2021-01-29','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_bill_calendar" VALUES ('1395619','911d4b92','1','2021-02-05','13:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:57','2022-09-21 02:21:57');
INSERT INTO "ls_bill_calendar" VALUES ('1395620','8fe4dfb0','1','2021-02-04','09:30:00','Room 1507','Government, Military and Veterans Affairs Hearing','2022-09-21 02:21:59','2022-09-21 02:21:59');
INSERT INTO "ls_bill_calendar" VALUES ('1395621','ab08430a','1','2021-02-18','09:30:00','Room 1113','Judiciary Hearing','2022-09-21 02:21:58','2022-09-21 02:21:58');
INSERT INTO "ls_stance" VALUES ('0','Watch');
INSERT INTO "ls_stance" VALUES ('1','Support');
INSERT INTO "ls_stance" VALUES ('2','Oppose');
COMMIT;
