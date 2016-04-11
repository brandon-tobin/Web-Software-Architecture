using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;

// Add Selenium includes
using OpenQA.Selenium;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium.Firefox;
using OpenQA.Selenium.Internal;
using System.Collections.Generic;

namespace HW9_Selenium
{
    [TestClass]
    public class UnitTest1
    {
        IWebDriver driver = new FirefoxDriver();

        string baseURL = "http://uofu-cs4540-77.westus.cloudapp.azure.com/";

        [TestMethod]
        /**
        * This method tests login functionality by logging into the admin account. 
        * Once logged into the account, it checks if the main header on the page says "Welcome Back Admin".
        * The test fails if it cannot find the expected text.
        */
        public void Test_Login()
        {
            driver.Navigate().GoToUrl(baseURL + "/Projects/Grad_Progress/home.php");
            driver.FindElement(By.Name("username")).Clear();
            driver.FindElement(By.Name("username")).SendKeys("admin");
            driver.FindElement(By.Name("password")).Clear();
            driver.FindElement(By.Name("password")).SendKeys("admin");
            driver.FindElement(By.Name("submit")).Click();
            Assert.AreEqual("Welcome Back Admin", driver.FindElement(By.CssSelector("h1.form-header")).Text);
        }

        [TestMethod]
        /**
        * This method tests to see if a student account can access a DGS level page.
        * Once logged into a student account, it tries to go to the DGS overview page and checks to see if the
        * main header on the page says "Access Forbidden". 
        * The test fails if it cannot find the expected text.
        */
        public void Access_Forbidden()
        {
            driver.Navigate().GoToUrl(baseURL + "/Projects/Grad_Progress/home.php");
            driver.FindElement(By.Name("username")).Clear();
            driver.FindElement(By.Name("username")).SendKeys("student");
            driver.FindElement(By.Name("password")).Clear();
            driver.FindElement(By.Name("password")).SendKeys("student");
            driver.FindElement(By.Name("submit")).Click();
            driver.Navigate().GoToUrl("https://uofu-cs4540-77.westus.cloudapp.azure.com/Projects/Grad_Progress/DGS/overview.php");
            Assert.AreEqual("Access Forbidden", driver.FindElement(By.CssSelector("h1.form-header")).Text);
        }

        [TestMethod]
        /**
        * This method tests to see if a student can create a new progress form.
        * Once logged into a student account, it tries to create a new progress form and then checks to see
        * if the form is loaded correctly when viewed in the graduate system.
        */
        public void Create_Form()
        {
            driver.Navigate().GoToUrl(baseURL + "/Projects/Grad_Progress/home.php");
            driver.FindElement(By.Name("username")).Clear();
            driver.FindElement(By.Name("username")).SendKeys("student");
            driver.FindElement(By.Name("password")).Clear();
            driver.FindElement(By.Name("password")).SendKeys("student");
            driver.FindElement(By.Name("submit")).Click();
            driver.FindElement(By.LinkText("View your forms")).Click();
            driver.FindElement(By.LinkText("Create Form")).Click();
            driver.FindElement(By.Name("activity1")).Clear();
            driver.FindElement(By.Name("activity1")).SendKeys("1");
            driver.FindElement(By.Name("activity1")).Clear();
            driver.FindElement(By.Name("activity1")).SendKeys("2");
            driver.FindElement(By.Name("activity1")).Clear();
            driver.FindElement(By.Name("activity1")).SendKeys("3");
            driver.FindElement(By.Name("activity2")).Clear();
            driver.FindElement(By.Name("activity2")).SendKeys("1");
            driver.FindElement(By.Name("semester_completed1")).Clear();
            driver.FindElement(By.Name("semester_completed1")).SendKeys("Spring 2017");
            driver.FindElement(By.Name("semester_completed2")).Clear();
            driver.FindElement(By.Name("semester_completed2")).SendKeys("Fall 2016");
            driver.FindElement(By.Name("activity3")).Clear();
            driver.FindElement(By.Name("activity3")).SendKeys("0");
            driver.FindElement(By.Name("activity3")).Clear();
            driver.FindElement(By.Name("activity3")).SendKeys("1");
            driver.FindElement(By.Name("activity4")).Clear();
            driver.FindElement(By.Name("activity4")).SendKeys("1");
            driver.FindElement(By.Name("activity4")).Clear();
            driver.FindElement(By.Name("activity4")).SendKeys("2");
            driver.FindElement(By.Name("activity4")).Clear();
            driver.FindElement(By.Name("activity4")).SendKeys("3");
            driver.FindElement(By.Name("activity4")).Clear();
            driver.FindElement(By.Name("activity4")).SendKeys("4");
            driver.FindElement(By.Name("semester_completed3")).Clear();
            driver.FindElement(By.Name("semester_completed3")).SendKeys("Fall 2016");
            driver.FindElement(By.Name("activity5")).Clear();
            driver.FindElement(By.Name("activity5")).SendKeys("1");
            driver.FindElement(By.Name("semester_completed4")).Clear();
            driver.FindElement(By.Name("semester_completed4")).SendKeys("Fall 2017");
            driver.FindElement(By.Name("activity6")).Clear();
            driver.FindElement(By.Name("activity6")).SendKeys("1");
            driver.FindElement(By.Name("activity6")).Clear();
            driver.FindElement(By.Name("activity6")).SendKeys("2");
            driver.FindElement(By.Name("semester_completed5")).Clear();
            driver.FindElement(By.Name("semester_completed5")).SendKeys("Fall 2016");
            driver.FindElement(By.Name("activity7")).Clear();
            driver.FindElement(By.Name("activity7")).SendKeys("1");
            driver.FindElement(By.Name("semester_completed6")).Clear();
            driver.FindElement(By.Name("semester_completed6")).SendKeys("Spring 2017");
            driver.FindElement(By.Name("semester_completed7")).Clear();
            driver.FindElement(By.Name("semester_completed7")).SendKeys("Fall 2016");
            driver.FindElement(By.Name("activity9")).Clear();
            driver.FindElement(By.Name("activity9")).SendKeys("1");
            driver.FindElement(By.Name("semester_completed9")).Clear();
            driver.FindElement(By.Name("semester_completed9")).SendKeys("Fall 2016");
            driver.FindElement(By.XPath("(//input[@name='requirements_met'])[2]")).Click();
            driver.FindElement(By.Name("comments")).Clear();
            driver.FindElement(By.Name("comments")).SendKeys("Student is making fantastic progress.");
            driver.FindElement(By.Name("submit")).Click();
            driver.Navigate().GoToUrl(baseURL + "/Projects/Grad_Progress/Student/student_forms.php?id=2222222");
            driver.FindElement(By.LinkText("View")).Click();


            Assert.AreEqual("3", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(2)")).Text);
            Assert.AreEqual("Spring 2017", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(4)")).Text);
            Assert.AreEqual("1", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(3) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2016", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(3) > td:nth-child(4)")).Text);
            Assert.AreEqual("1", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(4) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2016", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(4) > td:nth-child(4)")).Text);
            Assert.AreEqual("3", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(5) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2017", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(5) > td:nth-child(4)")).Text);
            Assert.AreEqual("1", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(6) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2016", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(6) > td:nth-child(4)")).Text);
            Assert.AreEqual("3", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(7) > td:nth-child(2)")).Text);
            Assert.AreEqual("Spring 2017", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(7) > td:nth-child(4)")).Text);
            Assert.AreEqual("1", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(8) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2016", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(8) > td:nth-child(4)")).Text);
            Assert.AreEqual("1", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(2)")).Text);
            Assert.AreEqual("Fall 2016", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(4)")).Text);
        }

        [TestMethod]
        /**
        * This method tests to see if a student can update their information, adivsor, committee, etc.
        * Once logged into a student account, it tries to update the student's information and then checks to see
        * if the information is loaded correctly when viewed in the graduate system.
        */
        public void Change_Student_Information()
        {
            driver.Navigate().GoToUrl(baseURL + "/Projects/Grad_Progress/home.php");
            driver.FindElement(By.Name("username")).Clear();
            driver.FindElement(By.Name("username")).SendKeys("student");
            driver.FindElement(By.Name("password")).Clear();
            driver.FindElement(By.Name("password")).SendKeys("student");
            driver.FindElement(By.Name("submit")).Click();
            driver.FindElement(By.LinkText("View/Update Information, Advisor, Committee")).Click();
            driver.FindElement(By.XPath("(//input[@id='degree'])[2]")).Click();
            new SelectElement(driver.FindElement(By.Id("track"))).SelectByText("Data");
            driver.FindElement(By.Id("semester_admitted")).Clear();
            driver.FindElement(By.Id("semester_admitted")).SendKeys("2016-01-02");
            new SelectElement(driver.FindElement(By.Id("committee2"))).SelectByText("Jim");
            new SelectElement(driver.FindElement(By.Id("committee3"))).SelectByText("Joe");
            new SelectElement(driver.FindElement(By.Id("committee4"))).SelectByText("James");
            driver.FindElement(By.Id("new_committee_checked")).Click();
            driver.FindElement(By.Name("Submit")).Click();

            Assert.AreEqual("Computing", driver.FindElement(By.XPath("(//input[@id='degree'])[2]")).GetAttribute("value"));
            Assert.AreEqual("Data", driver.FindElement(By.Id("track")).GetAttribute("value"));
            Assert.AreEqual("2016-01-02", driver.FindElement(By.Name("semester_admitted")).GetAttribute("value"));
            Assert.AreEqual("Peter", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(2) > ul:nth-child(1) > li:nth-child(1)")).Text);
            Assert.AreEqual("James", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(2) > ul:nth-child(1) > li:nth-child(2)")).Text);
            Assert.AreEqual("Jim", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(2) > ul:nth-child(1) > li:nth-child(3)")).Text);
            Assert.AreEqual("Joe", driver.FindElement(By.CssSelector(".table > tbody:nth-child(1) > tr:nth-child(10) > td:nth-child(2) > ul:nth-child(1) > li:nth-child(4)")).Text);
        }
    }
}
