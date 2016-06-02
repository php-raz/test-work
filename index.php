<?php
session_start();
require_once 'view/header.php';
require_once 'ini.php';


$tab = new CreateTable();
if (!$tab->show_tab()) {
    echo '<h4>Таблица `users` не найдена. Для её создания
        и заполнения нажмите <a href="load_data.php">здесь</a></h4>';
} else {
    $user = new Users();
    $data = $user->find();

    if (count($data)) {
        $result = '';
        $result .= '<a href="users/create.php">Добавить запись</a>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="row">№</th>
                            <th>ФИО</th>
                            <th>Статус</th>
                            <th>Удалить</th>
                            <th>Редактировать</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($data as $k => $row) {
            $result .= '<tr><td>' . $i . '</td>';
            $result .= '<td><a href="">' . $row['name'] . '</a></td>';
            $result .= '<td>' . $row['status'] . '</td>';
            $result .= '<td><a href="users/delete.php?delete='.$row['id'].'"> Удалить </a></td>';
            $result .= '<td><a href="users/update.php?update='.$row['id'].'">Редактировать</a></td></tr>';
            $i++;
        }
        $result .= '</tbody></table>';
        echo $result;
    }
}

require_once 'view/footer.php';