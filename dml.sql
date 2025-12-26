CREATE TABLE urls (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      long_url TEXT NOT NULL,
                      short_code VARCHAR(10) NOT NULL UNIQUE,
                      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);