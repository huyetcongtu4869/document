var GirlFriendEditController = function ($scope, $routeParams, $http) {
    console.log(666);

    if ($routeParams.id==undefined) {
        console.log(563456);
    }
    var id = $routeParams.id;
    $scope.inputs = {
        ten: ''
    };

    $scope.onGetDetail = function () {
        $http.get(`${API_NY}/${1}`).then(
            function (res) {
                // inputs.ten = res.data.ten;
                // Hiển thị dữ liệu cũ lên màn hình để người dùng sửa
                $scope.inputs = { ...res.data };
            },
            function (err) { }
        );
    };
    $scope.onGetDetail();

    // Khi bấm lưu sẽ call API kèm dữ liệu mới nhất để lưu
    $scope.onSave = function () {
        $http.put(`${API_NY}/${id}`, $scope.inputs).then(
            function (res) { $location.path('/quan-ly') },
            function (err) { },
        )
    }
}