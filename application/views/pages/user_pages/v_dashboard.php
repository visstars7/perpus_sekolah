<div class="container-fluid">
    <div>
        <p>Hello User</p>
        <?php
            var_dump($this->session->userdata('user'));
        ?>
    </div>
</div>