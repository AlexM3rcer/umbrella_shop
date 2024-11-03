// Не работает т.к. какие-то проблемы с установкой JDBC
// Но удалять не решил, т.к. может пригодится ещё
// Моменты с базой данных и системой авторизации\регистрации перенес в соотв. файлы
const connectionName = 'localhost';
const user = 'root';
const userPwd = '';
const db = 'umbrella_shop';
const dbUrl = 'jdbc:mysql://'+connectionName+'/'+db+'?useUnicode=true&characterEncoding=utf8';

function getConnection() {
  let connection = Jdbc.getConnection(dbUrl, user, userPwd);
  return connection;
}

const nameUser = document.getElementById(name_input);
const passwordUser = document.getElementById(password_input);

function auth() {
  let connection = getConnection();
  let authQuery = "SELECT * FROM users WHERE name = ? AND password = ?";
  let psAuth = connection.PrepareStatement(authQuery);
  psAuth.setString(1, nameUser.value);
  psAuth.setString(2, passwordUser.value);
  psAuth.execute();
  let resultSet = psAuth.getResultSet();
  if (resultSet.next()) {
    window.location.replace('Information\\information.php')
  }
  psAuth.close();
  connection.close();
}

const regName = document.getElementById(reg_name_input);
const regPassword = document.getElementById(reg_password_input);

function registration() {
  let connection = getConnection();
  let regQuery = "INSERT INTO users(login, password) VALUES (?, ?)";
  let psReg = connection.PrepareStatement(regQuery);
  psReg.setString(1, regName.value);
  psReg.setString(2, regPassword.value);
  psReg.execute();
  psReg.close();
  connection.close();
  window.location.replace('Information\\information.php')
}