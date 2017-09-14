# CodeIT_Task
Описание файлов.
db.sql - экспортированная БД.
config.php - содержит данные для подключения к БД, возвращает dsn для PDO.
routes.php - содержит доступные адреса для запросов.
index.php - точка входа.

core/database/connection.php - подключение БД, возвращает обьект PDO.
core/database/Query.php - класс для запросов в БД.
core/bootstrap.php - подключает необходимые файлы.
core/Router.php - класс для работы с путями, возвращает файлы по запрошеному адресу.
core/User.php - класс для работы с пользовательскими данными.
core/Validator.php - класс для валидации данных .

controllers/index.php - контроллер для формы авторизации, logout-a и "Личного кабинета", подключает -> views/index.view.php.
controllers/registration.php - контроллер для вывода формы регистрации, подключает -> views/registration.view.php.
controllers/signIn.php - контроллер для авторизации.
controllers/signUp.php - контроллер для регистрации.

public/registrationValidator.js -валидация при регистрации.
public/loginValidator.js - валидация при авторизации.

Процесс регистрации.
uri = 'registration' -> index.php -> запрос к Router(возвращает controllers/registration.php) -> заполнение формы -> js валидация.
->['POST'] to controllers/signUp.php -> new User -> php валидация -> if(Все ок){-> Query регистрация -> Авторизация -> uri = 'home' .}else{->['GET'] error -> uri = 'registration' -> Вывод ошибки}.

Процесс авторизации.
uri = '' -> index.php -> запрос к Router(возвращает controllers/index.php) -> заполнение формы -> js валидация.
->['POST'] to controllers/signIn.php -> php валидация -> проверка соответствия логин или email и пароля -> if(Все ок){ -> Авторизация ->. uri = 'home' }else{->['GET'] error -> uri = 'home' -> Вывод ошибки}.

