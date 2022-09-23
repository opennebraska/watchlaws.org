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
COMMIT;
