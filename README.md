# Zadanie rekrutacyjne diagnostyka

## 🔧 Konfiguracja

**Zmień nazwę pliku .env.example na .env:**

```bash
cp .env.example .env
```

## 🚀 Uruchamianie aplikacji

### Z użyciem Dockera

1. **Zbuduj i uruchom kontener:**

```bash
docker compose up --build
```

2. **Otwórz aplikację w przeglądarce:**

Przejdź do: [http://localhost:8000](http://localhost:8000)

3. **Uruchom testy w kontenerze:**

```bash
docker exec -it app php artisan test
```

### Bez użycia Dockera

1. **Zainstaluj zależności:**

```bash
npm install
```

```bash
composer install
```

2. **Uruchom aplikacje lokalnie:**

```bash
composer run dev
```

3. **Otwórz aplikację w przeglądarce:**

Przejdź do: [http://localhost:8000](http://localhost:8000)

4. **Uruchom testy lokalnie:**

```bash
php artisan test
```
