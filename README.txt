Tisztelt Ellenőrző!

1. Az alkalmazásnak egy 'test_task' elnevezésű DB-re van szüksége. (username:root, password:[nincsen]) /config/db.php
2. Consolból navigáljunk el a testTaks project mappájába
3. Ott adjuk ki a következő parancsot: php yii migrate

Az alkalmazás ettől a ponttól elméletileg működik.

A fejlesztéshez RewriteRule-t használtam. Amennyiben ez az exception nem lenne bekapcsolva a webszerveren abban az esetben a /config/web.php fájl 'urlManager' kulcsú tömbelemet kell ki comment-ezni.

Az e-mail küldést a saját gmail-es accountom segítségével teszteltem, szóval annak az adatait eltávolítottam. Ezen beállítások szintén a /config/web.php fájlban a 'mailer' kulcs alatt találhatók. Ezeket a paramétereket az alap állapotukba állítottam vissza.
 
Köszönöm türelmét!
