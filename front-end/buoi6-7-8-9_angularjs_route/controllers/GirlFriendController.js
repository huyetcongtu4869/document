var GirlFriendController = function ($scope, $http) {
    // Định nghĩa dữ liệu mặc định
    $scope.thong_tin_ca_nhan = {
        ten: '',
        tuoi: 0,
        dia_chi: ''
    };
    $scope.ds_nguoi_yeu = [];
    $scope.loading = true;
    // Làm việc với API để lấy dữ liệu mới về
    $http.get(API_TTCN)
        .then(
            function (res) {
                // Nếu lấy dữ liệu thành công thì mới vào đây
                $scope.thong_tin_ca_nhan = res.data;
            },
            function (err) { console.log(err); }
        );
    $scope.onGetList = function () {
        $http.get(API_NY)
            .then(
                function (res) {
                    $scope.loading = false;
                    $scope.ds_nguoi_yeu = res.data;
                },
                function (err) { console.log(err); }
            );
    }
    $scope.onGetList()
    $scope.onDelete = function (id) {
        let isConfirm=confirm('Are you sure you want to delete');
        if(!isConfirm) { return}
        $http.delete(`${API_NY}/${id}`)
    }


};
