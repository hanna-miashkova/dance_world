# dance_world
php storm + plugins Symfony, Bootstrap; 
xampp
composer 

W folderze xampp znajduje się folder htdocs, w który należy dodać projekt. W xampp włączamy Apache i MySql, otwieram projekt przez phpStorm (pobrać wtyczki symfony i bootstrap). W przeglądarce wpisać "http://localhost/dance_world/public/" w celu sprawdzenia poprawności logowania trzeba wejśc do phpmyadmin i utworzyć bd dance_world(dokłądnie taka nazwa). Tabela uzytkownik bedzie pusta ale wystarczy tam dodac admin admin. Następnym razem spróbujemy dodać fixtures które umożliwią pobranie już wpisanych przez nas danych z bazy.

zajęcia 4 : Stworzono stronę startową oraz połączono projekt z BD. Głównie praca była przeprowadzona ze stylem strony. Templatka „onas.html.twig” zawiera wszystkie elementy strony „O nas”, rozszerza ona templatkę „base. html.twig” którą zawiera „navbar. html.twig”. Arkusz styli znajduje się w folderze public. Stworzono również kontroller  „MainPageController” dla templatek bazowych. (na razie na stronie głównej w sliderze jest tylko pierwsze zdjęcie dobrane do strony, reszta będzie zmieniona żeby pasowała kolorystycznie)

zajęcia 5: Stworzono stronę logowania, dodano nowe opcje w menu widoczne po zalogowaniu, jest wylogowanie użytkownika i widok strony rejestracji. Problem się pojawił z encodowaniem hasła i podziałem użytkowników na role, dlatego w celu poprawnego działania zostawimy to na następne zajęcie. Również są sprawdzane niektóre warunki przy logowaniu oraz rejestracji. Templatka „login.html.twig” i „register.html.twig” odpowiednio. Do nich SecurityController. 


