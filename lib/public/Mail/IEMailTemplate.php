<?php
/**
 * @copyright 2017, Morris Jobke <hey@morrisjobke.de>
 *
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\Mail;

/**
 * Interface IEMailTemplate
 *
 * Interface to a class that allows to build HTML emails
 *
 * Example:
 *
 * <?php
 *
 * $emailTemplate = new EMailTemplate($this->defaults, $this->urlGenerator, $this->l10n);
 *
 * $emailTemplate->addHeader();
 * $emailTemplate->addHeading('Welcome aboard');
 * $emailTemplate->addBodyText('You have now an Nextcloud account, you can add, protect, and share your data.');
 *
 * $emailTemplate->addBodyButtonGroup(
 *     'Set your password', 'https://example.org/resetPassword/q1234567890qwertz',
 *     'Install Client', 'https://nextcloud.com/install/#install-clients'
 * );
 *
 * $emailTemplate->addFooter('Optional footer text');
 *
 * $htmlContent = $emailTemplate->renderHTML();
 * $plainContent = $emailTemplate->renderText();
 *
 * @since 12.0.0
 */
interface IEMailTemplate {
	/**
	 * Adds a header to the email
	 *
	 * @since 12.0.0
	 */
	public function addHeader();

	/**
	 * Adds a heading to the email
	 *
	 * @param string $title
	 *
	 * @since 12.0.0
	 */
	public function addHeading($title);

	/**
	 * Adds a paragraph to the body of the email
	 *
	 * @param string $text
	 *
	 * @since 12.0.0
	 */
	public function addBodyText($text);

	/**
	 * Adds a button group of two buttons to the body of the email
	 *
	 * @param string $textLeft Text of left button
	 * @param string $urlLeft URL of left button
	 * @param string $textRight Text of right button
	 * @param string $urlRight URL of right button
	 *
	 * @since 12.0.0
	 */
	public function addBodyButtonGroup($textLeft, $urlLeft, $textRight, $urlRight);

	/**
	 * Adds a button to the body of the email
	 *
	 * @param string $text Text of button
	 * @param string $url URL of button
	 *
	 * @since 12.0.0
	 */
	public function addBodyButton($text, $url);

	/**
	 * Adds a logo and a text to the footer. <br> in the text will be replaced by new lines in the plain text email
	 *
	 * @param string $text If the text is empty the default "Name - Slogan<br>This is an automatically generated email" will be used
	 *
	 * @since 12.0.0
	 */
	public function addFooter($text = '');

	/**
	 * Returns the rendered HTML email as string
	 *
	 * @return string
	 *
	 * @since 12.0.0
	 */
	public function renderHTML();

	/**
	 * Returns the rendered plain text email as string
	 *
	 * @return string
	 *
	 * @since 12.0.0
	 */
	public function renderText();
}
