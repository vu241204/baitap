<?php
if (!defined('ROOT_PATH')) {
    die('Can not access');
}
$titlePage = "Btec - Department";
$state = trim($_GET['state'] ?? null);
?>
<?php require 'view/partials/header_view.php'; ?>

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Groups
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <a class="btn btn-primary btn-sm" href="index.php?c=groups&m=add"> Add Groups</a>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6">
                <input type="text" id="keyword" value="<?= htmlentities($keyword); ?>" />
                <button id="btnSearchDepartment" class="btn btn-primary btn-sm">Search</button>
                <a class="btn btn-info btn-sm" href="index.php?c=departments"> Back to lists</a>
            </div>
        </div>
        <?php if ($state === 'success') : ?>
        <div class="my-3 text-success text-center">
            Action Successfully !
        </div>
        <?php endif; ?>
        <table class="table table-bordered table-striped my-3">
            <thead class="table-primary">
                <th>ID</th>
                <th>Department</th>
                <th>Name</th>
                <th>Student number</th>
                <th>User id</th>
                <th>Status</th>
                <th colspan="2" class="text-center" width="10%">Action</th>
            </thead>
            <tbody>
                <?php foreach ($courses ?? [] as $key => $item) : ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $departmentNames[$item['department_id']]; ?></td>
                    <td><?= $item['name']; ?></td>

                    <td><?= $item['status'] == 1 ? 'Active' : 'Deactive'; ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm"
                            href="index.php?c=groups&m=edit&id=<?= $item['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm"
                            href="index.php?c=groups&m=delete&id=<?= $item['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- phan trang du kieu -->
        <?= $htmlPage; ?>
    </div>
</div>

<?php require 'view/partials/footer_view.php'; ?>

<script>
let btnSearch = document.getElementById('btnSearchDepartment');
btnSearch.addEventListener('click', function() {
    let txtKeyword = document.getElementById('keyword');
    let keyword = txtKeyword.value.trim();
    if (keyword != '') {
        window.location.href = "index.php?c=groups&search=" + keyword;
    } else {
        alert('Enter keyword, please');
    }
});
</script>