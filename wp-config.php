<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'alura-intercambios' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'Shipuden1999' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'z~6mY;w->;DfmB /[ni;?.vFX*r,~YGF<Xkv^`CN>=,yp5Xww!dc|Zbj>=gz=xas' );
define( 'SECURE_AUTH_KEY',  'P#nui9@yle<]N-_g<Ew1=F;El$?,+mH!k5zz`%^*6|,[5RJS9r`80e3is35,Q(%,' );
define( 'LOGGED_IN_KEY',    ')Q!%N.;v_rhrb(q#:`bN?]>H:~uYm} rPPOz3B7Df_)#V:bF(*z|)k<lOi(XK#S=' );
define( 'NONCE_KEY',        ':GarkJ@vj;,lN*YmNE1}__%!ZmoVJ*#_%kEj`cFN^xgYHHB]g#EcGF-/)h:b_Nvk' );
define( 'AUTH_SALT',        'awIY)FI_@>;fJ|oG34%<w!_4^O0!J_Jb@h%ZX/MIoC%}$f(Ei+Kil-7k[d2b#JlP' );
define( 'SECURE_AUTH_SALT', '~eokq9Z6W<!u7a1P*e}16s@ZUgmH1cC9{-1`GhOvB!y?q*E74#(kP;zLPjE&|+[^' );
define( 'LOGGED_IN_SALT',   '}fAJO`A88R[Of]}r`fIyN>D}M;BS08wD!{{-=U;CCaGo cg/wH@P`)GeV)ep$(|9' );
define( 'NONCE_SALT',       '<VU{A7rLps{1ht/ $ccodkmb4Td3S>oQ!?7u]5lZc|xQrPO_Of=.<rY6 3RW6XN:' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
