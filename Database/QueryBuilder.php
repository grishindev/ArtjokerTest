<?php

class QueryBuilder
{
    public $pdo;

    function __construct()
    {
        // 1. Подключаемся к БД
        try{
        $this->pdo = new PDO('mysql:host=localhost; dbname=artjoker; charset=utf8', 'root', 'root', array(
            PDO::ATTR_ERRMODE => TRUE
        ));

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Список всех зарегистрированных пользователей
        function allUsers($table_1, $table_2)
        {
            $sql = "SELECT id, name, email, ter_address FROM $table_1 INNER JOIN $table_2 ON ter_id=territory ORDER BY id";
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

    // Регистрация нового пользователя
    function store($table, $data)
    {
        // 1. Ключи массива
        $keys = array_keys($data);

        // 2. Сформировать строку name, email, territory
        $stringOfKeys = implode(',', $keys);

        // 3. Сформировать метки :title, :content
        $placeholders = ':'. implode(', :', $keys);

        // 4. Формируем SQL-запрос
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false

        return $statement;
    }

    // Получение массива, состоящего из значений одного поля
    function getAllFromField($table, $field)
    {
        $sql = "SELECT $field FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Вывод одной записи по e-mail`у
    function getOneByEmail($table, $email)
    {
        $sql = "SELECT id, name, email, territory FROM $table WHERE email=:email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Подготовка запроса для выборки всех Областей
    function allRegionsQuery()
    {
        $sql = "SELECT * FROM t_koatuu_tree WHERE ter_type_id=0 && reg_id!=80 && reg_id!=85";
        $query = $this->pdo->query($sql);

        return $query;
    }

    // Подготовка запроса для выборки всех Городов
    function allCitiesQuery($region_ter_id)
    {
        $sql = "SELECT ter_id, ter_name, ter_address FROM t_koatuu_tree WHERE ter_pid=$region_ter_id && ter_type_id=1";
        $query = $this->pdo->query($sql);

        return $query;
    }

    // Подготовка запроса для выборки всех Районов города
    function allDistrictsQuery($city_ter_id)
    {
        $sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_pid=$city_ter_id && ter_type_id=3";
        $query = $this->pdo->query($sql);

        return $query;
    }

    // Подготовка запроса для получения адреса, если нет района города для выбора
    function addressByTerId($city_ter_id)
    {
        $sql = "SELECT ter_id FROM t_koatuu_tree WHERE ter_id=$city_ter_id";
        $query = $this->pdo->query($sql);

        return $query;
    }
}
