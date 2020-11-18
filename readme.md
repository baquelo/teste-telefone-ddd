# Extrair DDD e Número

## Criar método p/ extrair DDD e número de uma string.

Ex: "11987654321" retorna 11 e 987654321

O método será usado em uma rotina de importação de mailing. Como o cliente que gera o mailing, o formato do número pode variar:

``` 
11987654321
011987654321
5511987654321
+5511987654321
05511987654321
005511987654321
+005511987654321
11-987654321
11-98765-4321
55-11-987654321
e outros...
```

O método deve extrair o DDD e número da string e validar se o número é válido:

Celular: deve ter 9 dígitos começando c/ 9 ou pode ter 8 dígitos começando com 6,7,8,9 (nesse caso acrescentar 9 a esquerda do número)
Fixo: 8 dígitos não começando c/ 6,7,8,9

Se o número não for válido (ex: 1143322) disparar uma Exception com uma mensagem explicando o motivo de não ser válido.