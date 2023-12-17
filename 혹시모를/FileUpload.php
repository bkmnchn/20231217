<?php
// 업로드된 파일이 있는지 확인
if(isset($_FILES['userFile'])) {
    $file = $_FILES['userFile'];

    // 파일이 임시 디렉토리에 있는지 확인
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // 이동할 폴더 경로 설정 (여기서는 uploads 폴더에 저장)
        $uploadDirectory = 'uploads/';

        // 파일 이동
        if (move_uploaded_file($fileTmpName, $uploadDirectory . $fileName)) {
            echo "파일이 성공적으로 업로드되었습니다.";
        } else {
            echo "파일을 업로드하는 중에 문제가 발생했습니다.";
        }
    } else {
        echo "파일 업로드 중 오류가 발생했습니다.";
    }
} else {
    echo "파일이 제대로 전송되지 않았습니다.";
}
?>
