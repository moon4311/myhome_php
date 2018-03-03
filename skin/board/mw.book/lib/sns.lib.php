<?php
// 소셜 미디어로 코멘트보내기_TERRORBOY 

if ($board[bo_sns_bo]==1) {
// EUC --> UTF 설정후 전송
$subject_con = iconv('euc-kr', 'utf-8',$view[wr_subject]);
// 현제 페이지 주소 추출
$board_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

// 트위터
// URL붙이기 // 일부 시스템에서만 사용
$url= $subject_con."   ".$board_url;
//URL암호화
$url = urlencode($url);

// 페이스북
$face_url= $board_url;
$face_url = urlencode($face_url);
$face_subject = urlencode($subject_con);

// 미투데이
$me2_url= $board_url;
$me2_url = urlencode($me2_url);
$me2_subject = urlencode($subject_con);
$me2_url_text = $config[cf_title]; // 홈페이지 제목으로 출력
$me2_url_text = iconv('euc-kr', 'utf-8',$me2_url_text); //UTF변환
$me2_url_text = urlencode($me2_url_text); // 인코딩
$me2_teg = $g4['title']; // 테그 부분에 현제글 위치 표기
$me2_teg = iconv('euc-kr', 'utf-8',$me2_teg); //UTF변환
$me2_teg = urlencode($me2_teg); // 인코딩

// 요즘
$yozm_url= $board_url;
$yozm_url = urlencode($yozm_url);
$yozm_subject = urlencode($subject_con);
}

if ($board[bo_sns_co]==1) {
// EUC --> UTF 설정후 전송
$content2 = cut_str(strip_tags($list[$i][content]),80);
$subject_con2 = iconv('euc-kr', 'utf-8',$content2);
// 현제 페이지 주소 추출
$board_url2 = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

// 트위터
// URL붙이기 // 일부 시스템에서만 사용
$url2= $subject_con2."   ".$board_url2;
//URL암호화
$url2 = urlencode($url2);

// 페이스북
$face_url2= $board_url2;
$face_url2 = urlencode($face_url2);
$face_subject2 = urlencode($subject_con2);

// 미투데이
$me2_url2= $board_url2;
$me2_url2 = urlencode($me2_url2);
$me2_subject2 = urlencode($subject_con2);
$me2_url_text2 = $config[cf_title]; // 홈페이지 제목으로 출력
$me2_url_text2 = iconv('euc-kr', 'utf-8',$me2_url_text2); //UTF변환
$me2_url_text2 = urlencode($me2_url_text2); // 인코딩
$me2_teg2 = $g4['title']; // 테그 부분에 현제글 위치 표기
$me2_teg2 = iconv('euc-kr', 'utf-8',$me2_teg2); //UTF변환
$me2_teg2 = urlencode($me2_teg2); // 인코딩

// 요즘
$yozm_url2= $board_url2;
$yozm_url2 = urlencode($yozm_url2);
$yozm_subject2 = urlencode($subject_con2);
}
?>