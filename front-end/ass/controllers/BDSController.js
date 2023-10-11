var BDSController = function ($scope, $http) {
    $scope.ds_bds = {
        name: 2,
        type_id: 1,
        area: 132,
        price: 3123,
        image_url: "https://picsum.photos/id/193/180/100",
        status: 1
    };
    $scope.category_bds = {
        id: "",
        name: "",
    }
    $http.get(API_BDS)
        .then(
            function (res) {
                $scope.loading = false;
                $scope.ds_bds = res.data;
            },
            function (err) { console.log(err); }
        );
    $http.get(`${API_URL}category_bds`)
        .then(
            function (res) {
                $scope.loading = false;
                $scope.category_bds = res.data;
            },
            function (err) { console.log(err); }
        );
    $http.get('http://localhost:3000/info')
        .then(
            function (res) {
                $scope.data = res.data;
            },
            function (err) { console.log(err); }
        );
    $scope.onDelete = function (deleteId) {
        console.log(deleteId);
        var isConfirm = confirm('Bạn có muốn xoá không?');
        if (!isConfirm) {
            return;
        }
        $http.delete(`${API_BDS}/${deleteId}`)
    }
};
