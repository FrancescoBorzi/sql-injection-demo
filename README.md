This is a demonstration about SQL-Injection for an universitary project, you can view the demo at:

http://sqlidemo.altervista.org

- Legal login: <strong>admin</strong> Password: <strong>pwd1</strong>

- Vulnerable page <strong>login1.php</strong> can be violated by passing <strong>' OR '1'='1</strong> as password.

- Vulnerable page <strong>books1.php</strong> can be used to get all user table content by passing <strong>' UNION SELECT * FROM users WHERE '1'='1</strong> as author.